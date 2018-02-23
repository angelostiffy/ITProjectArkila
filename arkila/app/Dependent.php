<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    //
<<<<<<< HEAD
    protected $fillable = [
        'children_name',
        'birthdate',
    ];
=======
    protected $table = 'dependent';
    protected $primaryKey = ['operator_id', 'driver_id',];
    
>>>>>>> d7d5c6b52de465f18231bf9895ee0ea94ddb8779
}
