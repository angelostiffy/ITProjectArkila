<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Van extends Model
{
	protected $primaryKey = 'plate_number';
	public $incrementing = false;
	protected $keyType = 'String';
	//
	
	public function driver(){
    	return $this->belongsTo(Driver::Class, 'driver_id');
    }

}
