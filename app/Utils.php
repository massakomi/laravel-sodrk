<?php

namespace App;

use Illuminate\Support\Facades\Cache;

class Utils
{

    public static function loadUrl($remoteUrl, $minutes=1440, &$fromCache = true)
    {
        $html = Cache::get($remoteUrl);
        if (!$html || !$minutes) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $remoteUrl);
            curl_setopt($ch, CURLOPT_TIMEOUT, 15);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            $html = curl_exec($ch);
            curl_close($ch);
            Cache::put($remoteUrl, $html, $minutes);
            $fromCache = false;
        }
        return $html;
    }

    public static function getHtmlCached($remoteUrl)
    {
        $content = self::loadUrl($remoteUrl);
        $html = str_get_html($content);
        return $html;
    }

     public static function idImage($img) {
        $img = preg_replace('~/?files/~', '', $img);
        if (!$img) {
            return false;
        }
        $local = 'files/'.$img;
        if (!file_exists($local)) {
            $content = file_get_contents('https://www.sodrk.ru/files/'.$img);
            fwrite($a = fopen($local, 'w+'), $content); fclose($a);
        }
        $item = Files::firstOrNew(['path' => $img]);
        if (!$item->id) {
            $item->path = $img;
            $item->save();
        }
        return $item->id;
    }
}
