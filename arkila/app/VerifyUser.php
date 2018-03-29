<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
    protected $table = 'verify_users';
    protected $guarded = [];
 
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
