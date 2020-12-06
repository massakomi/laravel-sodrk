<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Category;
use App\Clients;

class TestController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function test()
    {
        // $this->clientsAdd();
    }


    /**
     * {@inheritdoc}
     */
    public function clientsAdd()
    {

        // example of how to use basic selector to retrieve HTML contents
        include('../app/simple_dom/simple_html_dom.php');

        // get DOM from URL or file
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
        //$content = file_get_contents('../resources/views/catalog/index.blade.php');
       // echo $content;

        // example of how to use basic selector to retrieve HTML contents
        include('../app/simple_dom/simple_html_dom.php');

        // get DOM from URL or file
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
