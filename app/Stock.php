<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    /**
    * Связанная с моделью таблица.
    * Там должно быть поле id (ai pk) и колонки updated_at и created_at (datetime)
    *
    * @var string
    */
    protected $table = 'sod_stock';

    protected $fillable = ['id', 'name'];

    public static function getByName($name)
    {
    	static $stocks;
    	if (!isset($stocks)) {
			$stocks = \Illuminate\Support\Facades\DB::table('sod_stock')->orderBy('name', 'desc')->pluck('id', 'name');
		}
		return $stocks[$name];
    }
}
