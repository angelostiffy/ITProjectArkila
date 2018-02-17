<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $primaryKey = 'driver_id';
    
    protected $guarded = [
        'driver_id',
    ];  
	
    //
    public function operator(){
    	return $this->belongsTo(Operator::Class, 'operator_id');
    }
    public function van(){
    	return $this->hasOne(Van::Class, 'driver_id');
    }

    public function getFullNameAttribute(){
        return "{$this->first_name} {$this->last_name}";
    }
}
