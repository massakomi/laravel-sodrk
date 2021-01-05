<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Validator, Auth, DB};
use App\Http\Controllers\Controller;
use App\{Category, Clients, Project, Files, News, Statuses};

use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{


    /**
     * {@inheritdoc}
     */
    public function test()
    {
 		
		$string = 'Laravel';
		$array = array_wrap($string, ['xxx']);
		echo '<pre>'.print_r($array, 1).'</pre>';
 
    }


    function laravelTest() {


        $this->helpersTest();
        echo '<hr>';
        $this->eloqTest();

        ?>

        <style>
            a + pre {display:none;}
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $('a').click(function() {
                    $(this).next().slideToggle();
                    return false;
                })
            })
        </script>
        <?php
    }

    function helpersTest() {

        echo 'app_path() = '.app_path();
        echo '<br />base_path() = '.base_path();
        echo '<br />base_path("config") = '.base_path("config");
        echo '<br />config_path() = '.config_path();
        echo '<br />public_path() = '.public_path();
        echo '<br />resource_path() = '.resource_path();
        echo '<br />storage_path() = '.storage_path();
        echo '<hr>';

        echo 'camel_case("foo_bar") = '.camel_case('foo_bar');
        echo '<br />kebab_case("fooBar") = '.kebab_case('fooBar');
        echo '<br />snake_case("fooBar") = '.snake_case('fooBar');
        echo '<br />str_contains("foo_bar", "bar") = '.str_contains("foo_bar", "bar");
        echo "<br />str_contains('This is my name', ['my', 'foo']);".str_contains('This is my name', ['my', 'foo']);
        echo '<br />ends_with("foo_bar", "bar") = '.ends_with("foo_bar", "bar");
        echo '<br />starts_with("foo_bar", "bar") = '.starts_with("foo_bar", "bar");
        echo '<br />str_after("foo_bar", "_") = '.str_after("foo_bar", "_");
        echo '<br />str_limit("The PHP framework for web artisans.", 10) = '.str_limit("The PHP framework for web artisans.", 10);

        ;
    }

    function eloqTest() {

        $items = Files::where('id', 30)
            ->orWhere('path', 'like', 'actions%')
            ->orderBy('created_at')
            ->skip(0)
            ->take(10)
            ->get();

        echo '$items.count() = '.$items->count();
        echo '<br />$items.avg(id) = '.$items->avg('id');
        echo '<br />$items->chunk(4)->toArray() = <a href="#">view</a><pre>'.print_r($items->chunk(4)->toArray(), 1).'</pre>';

        /*foreach ($items as $key => $item) {
            echo '<br />'.$item->id.') '.$item->path;
        }*/
    }

    function mailTest() {
        Mail::to('andymc@inbox.ru')->send(new OrderShipped($order));
    }

}
