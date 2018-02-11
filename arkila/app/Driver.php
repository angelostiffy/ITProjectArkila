<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $primaryKey = 'driver_id';
    
    protected $fillable = [
        'driver_id',
        'last_name',
        'first_name',
        'middle_name',
        'contact_number',
        'address',
        'provincial_address',
        'age',
        'birth_date',
        'birth_place',
        'gender',
        'citizenship',
        'civil_status',
        'number_of_children',
        'spouse',
        'spouse_birthdate',
        'father_name',
        'father_occupation',
        'mother_name',
        'mother_occupation',
        'person_in_case_of_emergency',
        'emergency_address',
        'emergency_contactno',
        'SSS',
        'license_number',
        'status',
        'expiry_date',
    ];  
	
    //
    public function operator(){
    	return $this->belongsTo(Operator::Class, 'operator_id');
    }
    public function van(){
    	return $this->hasOne(Van::Class, 'plate_number');
    }

}
