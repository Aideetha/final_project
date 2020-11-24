<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $table = 'carts';
    protected $primaryKey = 'cart_id';

    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function product(){
        return $this->hasMany('App\Product');
    }
    //SELECT * FROM `products` JOIN `carts` ON `products`.`product_id` = `carts`.`cart_id` WHERE `carts`.`user_id` = 2 
}
