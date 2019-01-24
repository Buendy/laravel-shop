<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zend\Diactoros\Request;

class CartDetail extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
