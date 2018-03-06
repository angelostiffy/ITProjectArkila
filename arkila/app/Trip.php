<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    //
    protected $table = 'trip';
    protected $primaryKey = 'trip_id';
    protected $guarded = [
        'trip_id',
    ];

    public function van(){
    	return $this->belongsTo(Van::class, 'plate_number');
    }

    public function destination(){
    	return $this->belongsTo(Destination::class, 'destination_id');
    }
}
