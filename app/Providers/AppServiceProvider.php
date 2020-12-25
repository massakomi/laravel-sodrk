<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
        $this->load404();

        $menu = [];
        $menu ['about']= [
            'О компании' => '',
            'Новости' => '/news',
            'Проекты' => '/projects',
            'Акции' => '/actions',
            'Клиенты' => '/clients'
        ];
        $menu ['contacts']= [
            'Контакты' => '',
        ];
        $menu ['corporate']= [
            'Также в разделе' => '',
            'Наши клиенты' => '/clients/2',
            'Для дилеров' => '/for-dealers',
            'Оплата и доставка' => '/corp-payment-delivery',
            'Статусы компании' => '/statuses',
            'Контакты' => '/contacts/2',
        ];
        $menu ['services']= [
            'Также в разделе' => '',
            'Услуги' => '/services/services',
            'Сервисные центры' => '/contacts/5',
            'Каталог услуг' => '/services/catalog',
            'Условия ремонта' => '/services/conditions-repaire',
            'Наши специалисты' => '/services/people',
            'Авторизации' => '/services/vendors',
            'Клиенты' => '/clients/5',
            'Оформление заявки' => '/request/services',
            'Информация' => '/list',
        ]; 
        $menu ['retail']= [
            'Также в разделе' => '',
            'Дисконтная программа' => '/discount-programm',
            'Акции' => '/actions/1',
            'Оплата и доставка' => '/retail-payment-delivery',
            'Наши магазины' => '/contacts/1',
        ];
        $menu ['subscription-service']= [
            'Также в разделе' => '',
            'Об услуге' => '/subscription-services/services',
            'Тарифные планы' => '/subscription-services/tariffs',
            'Наши проекты' => '/projects/6',
            'Service Desk <b></b>' => 'http://servicedesk.sodrk.ru/',
        ];
        foreach (\App\Clients::$directions as $key => $value) {
            if ($key > 0) {
                $menu ['contacts'][$value] = '/contacts/'.$key;
            }
        }
        View::share('menu', $menu);
    }

    /**
     * {@inheritdoc}
     */
    public function load404()
    {
        $path = substr($_SERVER['REQUEST_URI'], 1);
        $path = preg_replace('~\?.*~i', '', $path);
        if (strpos($path, '.')) {
        	$url = 'https://www.sodrk.ru/'.$path;
        } else {
            return ;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $content = curl_exec($ch);
        curl_close($ch);

        fwrite($a = fopen('log.txt', 'a+'), "\n".date('Y-m-d H:i:s').' '.$_SERVER['REQUEST_URI']); fclose($a);

        if ($content) {
            $dirs = explode('/', $path);
            $d = '';
            foreach ($dirs as $k => $v) {
                if ($d) {
                    $d .= '/';
                }
            	$d .= $v;
                if (file_exists($d)) {
                    continue;
                }
                if (preg_match('~\..{2,4}$~i', $d)) {
                    continue;
                }
                mkdir($d);
            }

            fwrite($a = fopen(urldecode($path), 'w+'), $content); fclose($a);
        }
        //var_dump($content); exit;
    }
}
