<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Rental;
class Van extends Model
{
    protected $table = 'van';
	protected $primaryKey = 'plate_number';
	public $incrementing = false;
	protected $keyType = 'String';
    protected $fillable = [
    	'plate_number',
        'model',
        'seating_capacity',
	];  
	//

    public function members(){
        return $this->belongsToMany(Member::class,'member_van','plate_number','member_id');
    }
    public function rental(){
    	return $this->hasOne(Rental::Class, 'rent_id');
    }

    public function driver(){
        return $this->members()->where('role','Driver');
    }

    public function operator(){
        return $this->members()->where('role','Operator');
    }

    public function trip(){
    	return $this->hasOne(Trip::Class, 'trip_id');
    }

}
