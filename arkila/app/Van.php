<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Van extends Model
{
    protected $table = 'van';
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

    public function member(){
        return $this->belongsToMany(Van::class,'member_van','plate_number','member_id');
    }
}
