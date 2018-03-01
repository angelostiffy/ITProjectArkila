<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'terminal_id', 'user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function terminal()
    {
        return $this->hasOne(Terminal::class, 'terminal_id');
    }

    public function scopeAdmin($query)
    {
        return $query->where('user_type', '=','Admin');
    }

    public function scopeDriver($query)
    {
        return $query->where('user_type', '=', 'Driver');   
    }

    public function scopeCustomer($query)
    {
        return $query->where('user_type', '=', 'Customer');   
    }
}
