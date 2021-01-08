<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Log, Auth, Validator, Cache, DB};
use App\Http\Controllers\Controller;
use App\{Category, Clients, Projects, Files, Utils, Info, ProductProp, ProductPropValue};

// импорт парсер данных с сайта содействие
class ImportController extends Controller
{

    public function __invoke() {
        if ($_GET['alias']) {
            self::importProducts();
        }



    }

    public function importInfo()
    {

        include('../app/simple_dom/simple_html_dom.php');
        $html = Utils::getHtmlCached('https://www.sodrk.ru/info-list');

        foreach ($html->find('.pr_one') as $client) {
            $alias = str_replace('/info/', '', $client->find('a', 0)->href);
            $name = $client->find('p.hd', 0)->innertext;
            $content = $client->find('p.hd + p', 0)->innertext;
            $img = parse_url($client->find('img', 0)->src)['path'];

            $img = str_replace('/files/', '', $img);
            $imageId = Utils::idImage($img);

            $row = [
                'alias' => $alias,
                'id_image' => $imageId,
                'name' => $name,
                'preview_text' => $content
            ];
            $project = Info::firstOrCreate(['alias' => $alias], $row);

        }
    }

    public function importProducts()
    {

        include('../app/simple_dom/simple_html_dom.php');
        ini_set('max_execution_time', 3600);
        @ini_set('output_buffering', 0);
        @ini_set('implicit_flush', 1);
        ob_implicit_flush(1);

        $category = Category::where('alias_full', 'like', $_GET['alias'])->first();
        $remoteUrl = 'https://www.sodrk.ru/'.$category->alias_full;

        while ($remoteUrl) {
            $content = Utils::loadUrl($remoteUrl, $minutes=1440*30, $fromCache);
            echo '<br />'.$k.' / '.$category->id.') '.$remoteUrl;

            $html = str_get_html($content);

            // category props
            if (!$category->meta_title) {
                $category->meta_title = $html->find('title', 0)->innertext;
                $category->meta_description = mb_substr($html->find('meta[name=description]', 0)->content, 0, 250);
                $category->seo_txt = $html->find('.seo_txt_wrap .wysiwyg', 0)->innertext;
                $category->content = $html->find('.catalog_list--wysiwyg', 0)->innertext;
                $category->save();
            }

            // add products
            $data = $this->getProductRows($html);  var_dump(count($data));

            foreach ($data as $k => list($row, $props)) {
                $row ['id_category'] = $category->id;
                //echo '<pre>'.print_r($row, 1).'</pre>'; exit;
                $product = \App\Product::updateOrCreate([
                    'alias' => $row['alias']
                ], $row);
                if ($props) {
                    foreach ($props as $param => $value) {
                        $prop = ProductProp::where('name', $param)->first();
                        $propValue = ProductPropValue::create([
                            'id_product' => $product->id,
                            'id_prop' => $prop->id,
                            'value' => strip_tags($value)
                        ]);
                    }
                }
            }

            $urlNext = $html->find('.btn_next', 0)->href;
            if ($urlNext) {
                $remoteUrl = 'https://www.sodrk.ru'.$urlNext;
            } else {
                break;
            }
        }

    }

    public function getProductRows($html) {

        $data = [];
        foreach ($html->find('.it_one') as $item) {

            $alias = str_replace('/item/', '', $item->find('a', 0)->href);
            $name = $item->find('p.name a', 0)->innertext;
            //$name = preg_replace('~\[.+~i', '', $name);

            $price = $item->find('div.price', 0)->find('span', 0)->innertext;
            $price = (float)preg_replace('~[^\.\d]~i', '', $price);

            $price_old = $item->find('p.black b.line', 0)->innertext;
            if ($price_old) {
            	$price_old = (float)preg_replace('~[^\.\d]~i', '', $price_old);
            }

            $special = $item->find('.icon .spec', 0)->innertext ? 1 : 0;
            $sale = $item->find('.icon .sale', 0)->innertext ? 1 : 0;
            $credit = $item->find('.catalog_list__credit', 0) ? 1 : 0;
            $stock = $item->find('.buttons > p', 0)->innertext;

            $url = 'https://www.sodrk.ru'.$alias;

            $props = [];
            foreach ($item->find('tr') as $tr) {
                $param = $tr->find('td', 0)->innertext;
                $value = $tr->find('td', 1)->innertext;
                $props [mb_substr(trim($param), 0, -1)]= trim($value);
            }

            $img = parse_url($item->find('img', 0)->src)['path'];
            $img = str_replace('thumbnail', 'image', $img);
            $id_image = Utils::idImage($img);

            $row = compact('name', 'price', 'price_old', 'alias', 'id_image', 'special', 'sale', 'stock', 'credit', 'url', 'id_image');
            foreach ($row as $k => $v) {
                if (is_scalar($v)) {
                    $row [$k] = trim($v);
                }
            }
            //echo '<pre>'.print_r($row, 1).'</pre>'; exit;
            $data []= [$row, $props];
        }
        return $data;
    }

    function actionsAdd() {

        $html = file_get_html('https://www.sodrk.ru/actions?page=2');

        $data = [];
        foreach ($html->find('.promo_one') as $client) {

            $created_at = date('Y-m-d H:i:s', strtotime($client->find('p.date', 0)->innertext));
            $name = $client->find('p.hd', 0)->innertext;
            $from_to = $client->find('p.hd + p', 0)->innertext;
            $alias = $client->find('a', 0)->href;
            $alias = str_replace('/action/', '', $alias);

            $img = parse_url($client->find('img', 0)->src)['path'];
            $id_image = Utils::idImage($img);


            $one = file_get_html('https://www.sodrk.ru'.$client->find('a', 0)->href);
            $content = $one->find('.wysiwyg', 0)->innertext;

            $row = compact('created_at', 'name', 'from_to', 'content', 'alias', 'id_image');
            $data []= $row;

            $project = \App\Actions::firstOrCreate($row);

        }

        echo '<pre>'.print_r($data, 1).'</pre>';
    }

    function statusAdd() {

        // get DOM from URL or file
        $html = file_get_html('https://www.sodrk.ru/statuses?page=2');

        $data = [];
        foreach ($html->find('.cr_one') as $client) {

            $name = $client->find('.p1', 0)->innertext;
            $title = $client->find('.p2', 0)->innertext;
            $content = $client->find('.p2 + p', 0)->innertext;
            $url = $client->find('a', 1)->href;
            $url = preg_replace('~https?://~i', '', $url);
            $url = preg_replace('~/$~i', '', $url);

            $row = compact('name', 'title', 'content', 'url');

            $img = parse_url($client->find('img', 0)->src)['path'];
            $row ['id_image'] = Utils::idImage($img);

            $data []= $row;

            $project = \App\Statuses::firstOrCreate($row);

        }

        echo '<pre>'.print_r($data, 1).'</pre>';
    }

   /**
     * {@inheritdoc}
     */
    public function projecstAdd()
    {
        // get DOM from URL or file
        $html = file_get_html('../resources/views/test/projects.blade.php');

        foreach ($html->find('.pr_one') as $client) {
            $id = str_replace('/project/', '', $client->find('a', 0)->href);
            $name = $client->find('p.hd', 0)->innertext;
            $content = $client->find('p.hd + p', 0)->innertext;
            $img = parse_url($client->find('img', 0)->src)['path'];

            $img = str_replace('/files/', '', $img);
            echo '<br />'.$name;

            $item = Files::firstOrNew(['path' => $img]);
            if (!$item->id) {
                $item->path = $img;
                $item->save();
            }

            $project = Projects::firstOrCreate([
                'id' => $id,
                'id_image' => $item->id,
                'name' => $name,
                'content' => $content
            ]);

        }

    }


    /**
     * {@inheritdoc}
     */
    public function saveCheck()
    {

        $sitem = new Clients;
        $sitem->name = 1;
        $sitem->image = 1;
        $sitem->url = 'http://ta.ru';

        $rules = [
            'name' => 'required|min:2',
            'url' => 'url',
        ];
        $validator = Validator::make($sitem->toArray(), $rules);
        if ($validator->fails()) {
            foreach ($validator->messages()->all('<li>:message</li>') as $message) {
                echo '<br />'.$message;
            }
        }

        // $this->clientsAdd();
    }


    /**
     * {@inheritdoc}
     */
    public function clientsAdd()
    {
        $html = file_get_html('../resources/views/test/clients.blade.php');

        foreach ($html->find('div.client_one a') as $client) {
            $name = $client->find('span', 0)->innertext;
            $img = basename(parse_url($client->find('img', 0)->src)['path']);

            $sitem = Clients::firstOrNew(['name' => $name]);
            if ($sitem->id) {
                $sitem->direction = rand(1, 6);
                $sitem->save();
                continue;
            }

            $sitem = new Clients;
            $sitem->name = $name;
            $sitem->image = $img;
            $sitem->url = $client->href;
            $sitem->save();

        }

    }


    /**
     * {@inheritdoc}
     */
    public function subCatsParse()
    {
        $html = file_get_html('../resources/views/catalog/index0.blade.php');

        foreach ($html->find('li.level_1') as $vacancy) {
            $href = $vacancy->find('a', 0);
            //$element->plaintext;
            $item = Category::where('alias_full', substr($href->href, 1))->first();
            echo '<br />'.$href->href.' ('.$item['id'].')';
            //var_dump($item['id']); exit;

            foreach ($vacancy->find('li.level_2') as $sub) {
                $a = $sub->find('a', 0);
                echo '<br />--- '.$a->innertext;

/*
                $sitem = new Category;
                $sitem->name = $a->innertext;
                $sitem->id_parent = $item['id'];
                $sitem->alias = basename($a->href);
                $sitem->alias_full = substr($a->href, 1);
                $sitem->save();
*/
            }


            //$element->innertext; // хз в чем отличие
            //$element->outertext; // весь html код всего блока

            // атрибуты доступны как $element->href, $element->name и т.п.

            /*echo '<pre>';
            $vacancy->dump();
            echo '</pre>';*/
        }


    }

    /**
     * {@inheritdoc}
     */
    /*public function parseCategories()
    {
        $content = file_get_contents('../resources/views/catalog-menu.blade.php');
        echo $content;

        preg_match_all('~<li>\s*<a href="/([^"]+)"><i></i>([^<]+)</a>\s*<ul class="sub" style="display: none;">(.*?)</ul>\s*</li>~is', $content, $a);

        $categories = [];
        foreach ($a[1] as $k => $alias) {
            $title = $a[2][$k];
            $subs = $a[3][$k];
            $item = compact('alias', 'title');
            echo '<br />'.$title;
            preg_match_all('~<a href="/([^"]+)"><i></i>([^<]+)</a>~i', $subs, $b);
            $item ['subs'] = [];
            foreach ($b[1] as $k => $url2) {
                $title2 = $b[2][$k];
                $item ['subs'][] = compact('url2', 'title2');
            }
            $categories []= $item;
        }

        foreach ($categories as $k => $v) {

            if (0) {
                $item = new Category;
                $item->name = $v['title'];
                $item->alias = basename($v['alias']);
                $item->alias_full = $v['alias'];
                $item->save();
            }

            $item = Category::where('name', $v['title'])->first();

            if ($v['subs']) {
                foreach ($v['subs'] as $b) {
                    $sitem = new Category;
                    $sitem->name = $b['title2'];
                    $sitem->id_parent = $item->id;
                    $sitem->alias = basename($b['url2']);
                    $sitem->alias_full = $b['url2'];
                    $sitem->save();
                    //exit;
                }
            }

        }
    }*/
}
