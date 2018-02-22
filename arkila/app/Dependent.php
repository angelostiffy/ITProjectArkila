<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    //
    protected $table = 'dependent';
    protected $primaryKey = ['operator_id', 'driver_id',];
    
}
