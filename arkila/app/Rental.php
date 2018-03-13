<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Van;

class Rental extends Model
{
    protected $table = 'rental';
    protected $primaryKey = 'rent_id';
    protected $guarded = [
        'rent_id',
    ];

    public function van(){
    	return $this->belongsTo(Van::Class, 'plate_number');
    }

    public function getFullNameAttribute(){
        return "{$this->first_name} {$this->last_name}";
    }

    public function vanmodel(){
    	return $this->hasOne(VanModel::Class, 'model_id');
    }
}
