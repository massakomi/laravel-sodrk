<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\{ProductProp, ProductPropValue};

class Product extends Model
{
    /**
    * Связанная с моделью таблица.
    * Там должно быть поле id (ai pk) и колонки updated_at и created_at (datetime)
    *
    * @var string
    */
    protected $table = 'sod_product';

    protected $fillable = ['id_image', 'name', 'price', 'price_old', 'alias', 'special', 'sale', 'stock', 'credit', 'id_category'];


    /**
     * Картинка
     */
    public function image()
    {
        return $this->hasOne('App\Files', 'id', 'id_image');
    }

    /**
     * Картинка
     */
    public function category()
    {
        return $this->hasOne('App\Category', 'id', 'id_category');
    }

    /**
     * Картинка
     */
    public function props()
    {
        return $this->hasMany('App\ProductPropValue', 'id_product', 'id');
    }

   /**
    *
    */
    public function getPriceFormattedAttribute($value)
    {
        return number_format($this->price, 2, '.', ' ');
    }

   /**
    *
    */
    public function getPriceCreditAttribute($value)
    {
        return number_format($this->price / 10, 2, '.', ' ');
    }

   /**
    *
    */
    public function getPriceOldFormattedAttribute($value)
    {
        return $this->price_old ? number_format($this->price_old, 2, '.', ' ') : '';
    }

    public static function getData($request)
    {
        $field = 'id';
        $order = 'asc';
        if ($request->get('sort-by') == 'name-up' || $request->get('sort-by') == 'name-down') {
            $field = 'name';
            if ($request->get('sort-by') == 'name-down') {
                $order = 'desc';
            }
        }
        if ($request->get('sort-by') == 'price-up' || $request->get('sort-by') == 'price-down') {
            $field = 'price';
            if ($request->get('sort-by') == 'price-down') {
                $order = 'desc';
            }
        }
        if ($request->get('sort-by') == 'novelty') {
            $field = 'created_at';
            $order = 'desc';
        }
        if ($request->get('sort-by') == 'sale') {
            $field = 'sale';
            $order = 'desc';
        }
        return self::orderBy($field, $order);
    }

    function checkAndLoad()
    {
        require dirname(__FILE__).'/simple_dom/simple_html_dom.php';
        $remoteUrl = 'https://www.sodrk.ru/item/'.$this->alias;
        $content = Utils::loadUrl($remoteUrl, $minutes=1440*30, $fromCache);
        $html = str_get_html($content);

        $this->description = trim($html->find('#con_tab3 .wysiwyg', 0)->innertext);
        $this->garanthy = trim($html->find('.garanthy', 0)->innertext);
        $this->text1 = trim($html->find('#con_tab1 .wysiwyg', 0)->innertext);
        $this->text2 = trim($html->find('#con_tab1 .wysiwyg', 1)->innertext);

        // Доп картинки
        if (!count($this->props)) {
            foreach ($html->find('.img_full .fancybox') as $img) {
                $img = parse_url($img->href)['path'];
                if (strpos($img, 'attachment_images')) {
                    $id_image = Utils::idImage($img);
                    //$images []= $id_image;
                    \Illuminate\Support\Facades\DB::table('sod_product_image')->insert([
                        'id_product' => $this->id,
                        'id_image' => $id_image
                    ]);
                }
            }
        }
        $this->imagesAttached = \Illuminate\Support\Facades\DB::select('select * from sod_files where id IN (SELECT id_image FROM sod_product_image WHERE id_product = ?)', [$this->id]);

        // Склад
        if (!count($this->props)) {
            foreach ($html->find('.availability .av_one') as $stock) {
                $stockTitle = $stock->find('p', 0)->innertext;
                $stockId = Stock::getByName($stockTitle);
                $value = count($stock->find('.it_y'));
                \Illuminate\Support\Facades\DB::table('sod_product_stock')->insert([
                    'id_product' => $this->id,
                    'id_stock' => $stockId,
                    'value' => $value
                ]);
            }
        }
        $this->stocks = \Illuminate\Support\Facades\DB::select('select * from sod_product_stock ps LEFT JOIN sod_stock s ON ps.id_stock=s.id WHERE ps.id_product = ?', [$this->id]);

        // Загружаем свойства
        $props = [];
        foreach ($html->find('#con_tab1 .params') as $paramBlock) {
            $group = trim($paramBlock->find('.hd', 0)->innertext);
            foreach ($paramBlock->find('.p_one') as $param) {
                $name = trim($param->find('.name', 0)->innertext);
                $value = trim($param->find('.txt', 0)->innertext);
                $props [$group][$name] = $value;
            }
        }
        if (!count($this->props)) {
            // ProductPropValue::where('id_product', $this->id)->delete();
            foreach ($props as $group => $params) {
                foreach ($params as $param => $value) {
                    $prop = ProductProp::firstOrCreate(
                        ['name' => $param, 'group' => $group]
                    );
                    $propValue = ProductPropValue::create([
                        'id_product' => $this->id,
                        'id_prop' => $prop->id,
                        'value' => strip_tags($value)
                    ]);
                }
            }
        }

        // Похожие
        /*$similar = [];
        foreach ($html->find('.category li > a') as $a) {
            $similar []= str_replace('/item/', '', $a->href);
        }*/

        //echo '<pre>'.print_r($props, 1).'</pre>';

        // var_dump($remoteUrl); exit;
    }
}
