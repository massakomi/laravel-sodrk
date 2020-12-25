<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /**
    * Связанная с моделью таблица.
    * Там должно быть поле id (ai pk) и колонки updated_at и created_at (datetime)
    *
    * @var string
    */
    protected $table = 'sod_news';

    /**
     * Картинка
     */
    public function file()
    {
        return $this->hasOne('App\Files', 'id', 'id_image');
    }
}
