<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{

    /**
    * Связанная с моделью таблица.
    * Там должно быть поле id (ai pk) и колонки updated_at и created_at (datetime)
    *
    * @var string
    */
    protected $table = 'sod_info';

    protected $attributes = array(
        'id_image' => 0,
        'alias' => '',
        'content' => ''
    );

    protected $guarded = [];

    /**
     * Картинка
     */
    public function image()
    {
        return $this->hasOne('App\Files', 'id', 'id_image');
    }
}
