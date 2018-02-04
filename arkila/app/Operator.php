<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Operator extends Model
{
	protected $primaryKey = 'operator_id';
    
    public function driver(){
    	return $this->hasMany(Driver::class, 'driver_id');
    }
}
