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

    public function member(){
        return $this->belongsToMany(Van::class,'member_van','plate_number','member_id')
            ->withPivot('role');
    }
    public function rental(){
    	return $this->hasOne(Rental::Class, 'rent_id');
    }
}
