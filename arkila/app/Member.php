<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';
    protected $primaryKey = 'member_id';
    protected $guarded = [
        'member_id',
    ];

    public function van(){
        return $this->belongsToMany(Van::class,'member_van','member_id','plate_number');
    }
    public function children(){
        return $this->hasMany(Dependent::class,'member_id','member_id');
    }

    public function addChildren($children_name,$birthdate){
        $this->children()->create(compact('children_name','birthdate'));
    }

    public static function scopeOperators($query){
        return $query->where('role','Operator');
    }

    public static function scopeDrivers($query){
        return $query->where('role','Driver');
    }


    public function getContactNumberAttribute($value){
        return substr($value, 3);
    }

    public function getEmergencyContactnoAttribute($value){
        return substr($value, 3);
    }

    public function getFullNameAttribute(){
        return "{$this->first_name} {$this->last_name}";
    }

}
