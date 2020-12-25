<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statuses extends Model
{
    /**
    * Связанная с моделью таблица.
    * Там должно быть поле id (ai pk) и колонки updated_at и created_at (datetime)
    *
    * @var string
    */
    protected $table = 'sod_status';

    protected $fillable = ['id', 'id_image', 'name', 'title', 'content', 'url'];


    /**
     * Картинка
     */
    public function image()
    {
        return $this->hasOne('App\Files', 'id', 'id_image');
    }
}
