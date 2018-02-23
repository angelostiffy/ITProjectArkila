<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Destination extends Model
{
    protected $table = 'destination';
	protected $primaryKey = 'destination_id';
    protected $guarded = ['destination_id',];

    public function reservation(){
    	return $this->hasOne(Reservation::class, 'id');
    }
    //
}
