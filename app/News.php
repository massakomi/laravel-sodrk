<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;

    /**
    * Связанная с моделью таблица.
    * Там должно быть поле id (ai pk) и колонки updated_at и created_at (datetime)
    *
    * @var string
    */
    protected $table = 'sod_news';

    protected $attributes = array(
        'id_image' => 0,
        'alias' => '',
        'content' => ''
    );
  
    protected $guarded = [];

    /**
     * Картинка
     */
    public function file()
    {
        return $this->hasOne('App\Files', 'id', 'id_image');
    }
}
