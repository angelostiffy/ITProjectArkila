<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Operator extends Model
{
	protected $primaryKey = 'operator_id';
    
    public function driver(){
    	return $this->hasOne(Driver::class, 'operator_id');
    }
}
