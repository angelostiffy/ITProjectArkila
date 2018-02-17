<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Operator extends Model
{
	protected $primaryKey = 'operator_id';
	    protected $guarded = [
    	'operator_id',
	]; 
    
    public function driver(){
    	return $this->hasMany(Driver::class, 'driver_id');
    }

    public function getFullNameAttribute(){
        return "{$this->first_name} {$this->last_name}";    	
    }
}
