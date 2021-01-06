<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPropValue extends Model
{

    protected $table = 'sod_product_prop_values';

    protected $fillable = ['id_product', 'id_prop', 'value'];

    /**
     *
     */
    public function prop()
    {
        return $this->hasOne('App\ProductProp', 'id', 'id_prop');
    }

}
