<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';

    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }

    public function transaction_history()
    {
        return $this->belongsTo('App\TransactionHistory');
    }
}
