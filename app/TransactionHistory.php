<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    //
    protected $table = 'transaction_histories';
    protected $primaryKey = 'transaction_id';

    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function product()
    {
        return $this->hasMany('App\Product');
    }
}
