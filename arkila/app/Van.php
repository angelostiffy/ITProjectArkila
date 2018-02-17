<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Van extends Model
{
	protected $primaryKey = 'plate_number';
	public $incrementing = false;
	protected $keyType = 'String';
    protected $fillable = [
    	'plate_number',
        'model',
        'operator_id',
        'driver_id',
        'seating_capacity',
	];  
	//
	
	public function driver(){
    	return $this->belongsTo(Driver::Class, 'driver_id');
    }

    public function operator(){
    	return $this->belongsTo(Operator::Class, 'operator_id');
    }
}
