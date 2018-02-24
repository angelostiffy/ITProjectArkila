<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    //
    protected $fillable = [
        'children_name',
        'birthdate',
    ];
    protected $table = 'dependent';
    protected $primaryKey = ['operator_id', 'driver_id',];
    
}
