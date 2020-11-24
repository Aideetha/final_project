<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = 'users';

    public function role(){
        return $this->hasOne('App\Role', 'role_id', 'role_id');
    }

    public function cart(){
        return $this->belongsTo('App\Cart');
    }

    public function transaction_history(){
        return $this->belongsTo('App\TransactionHistory');
    }

    public function hasRole($role){
        if ($this->role()->where('role_name', $role)->first()) {
            return true;
        }
        return false;
    }
}
