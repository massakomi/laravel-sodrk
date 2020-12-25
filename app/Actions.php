<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actions extends Model
{
    /**
    * Связанная с моделью таблица.
    * Там должно быть поле id (ai pk) и колонки updated_at и created_at (datetime)
    *
    * @var string
    */
    protected $table = 'sod_actions';

    protected $fillable = ['id', 'name', 'alias', 'id_image', 'from_to', 'content'];


    /**
     * Картинка
     */
    public function image()
    {
        return $this->hasOne('App\Files', 'id', 'id_image');
    }
}
