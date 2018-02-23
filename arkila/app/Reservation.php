<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $primaryKey = 'id';

	protected $guarded = [
    	'id',
    ]; 
    

    public function destination(){
    	return $this->belongsTo(Destination::Class, 'destination_id');
    }

    public function getContactNumberAttribute($value){
        return substr($value, 3);
    }

}
