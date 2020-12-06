<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    /**
    * Связанная с моделью таблица.
    * Там должно быть поле id (ai pk) и колонки updated_at и created_at (datetime)
    *
    * @var string
    */
    protected $table = 'sod_clients';

    protected $fillable = ['name'];

    static $directions = [
        0 => 'Все направления',
        2 => 'Корпоративный отдел',
        3 => '1С',
        4 => 'Сети и системы безопасности',
        5 => 'Сервисный центр',
        6 => 'Абонентское обслуживание'
    ];

    /**
    * Получить
    */
    /*public function offers()
    {
        return $this->hasMany('App\Offers');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getTitle()
    {
        return ($this->id_nedv == 1 ? 'Продаю ': 'Сдаю ').' '.$this->type;
    }

    public function getImages()
    {
        if (!$this->id) {
            return [];
        }
        $images = glob('images/items/'.$this->id.'/*');
        foreach ($images as $k => &$v) {
        	$v = '/'.$v;
        }
        return $images;
    }*/
}
