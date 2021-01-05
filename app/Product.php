<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
    * Связанная с моделью таблица.
    * Там должно быть поле id (ai pk) и колонки updated_at и created_at (datetime)
    *
    * @var string
    */
    protected $table = 'sod_product';

    protected $fillable = ['id_image', 'name', 'price', 'price_old', 'alias', 'special', 'sale', 'stock', 'id_category'];


    /**
     * Картинка
     */
    public function image()
    {
        return $this->hasOne('App\Files', 'id', 'id_image');
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
}
