<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductProp extends Model
{

    protected $table = 'sod_product_prop';

    protected $fillable = ['name', 'group'];

}
