<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
    * Связанная с моделью таблица.
    * Там должно быть поле id (ai pk) и колонки updated_at и created_at (datetime)
    *
    * @var string
    */
    protected $table = 'sod_category';

    protected $fillable = ['name'];

   /**
     *
     *
     * @param  string  $value
     * @return void
     */
    public function setSeoTxtAttribute($value)
    {
        $this->attributes['seo_txt'] = trim($value);
    }

   /**
     *
     *
     * @param  string  $value
     * @return void
     */
    public function setContentAttribute($value)
    {
        $this->attributes['content'] = trim($value);
    }

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
