<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
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

    public function operator(){
        return $this->belongsTo(Member::class, 'operator_id');
    }

    public function drivers(){
        return $this->hasMany(Member::class, 'operator_id','member_id');
    }

    public function addChildren($children){
        foreach($children as $children_name=>$birthdate){
            $this->children()->create(compact('children_name','birthdate'));
        }
    }


    public static function scopeAllOperators($query){
        return $query->where('role','Operator');
    }

    public static function scopeAllDrivers($query){
        return $query->where('role','Driver');
    }


    public function getEditContactNumberAttribute(){
        return substr($this->contact_number, 3);
    }

    public function getEditEmergencyContactnoAttribute(){
        return substr($this->emergency_contactno, 3);
    }

    public function getFullNameAttribute(){
        return "{$this->first_name} {$this->last_name}";
    }

    public function getBirthDateAttribute($value){
        return  Carbon::parse($value)->format('m/d/Y');
    }

    public function getSpouseBirthdateAttribute($value){
        return Carbon::parse($value)->format('m/d/Y');
    }

    public function getExpiryDateAttribute($value){
        return Carbon::parse($value)->format('m/d/Y');
    }

    public function setBirthDateAttribute($value){
        $this->attributes['birth_date'] = Carbon::parse($value);
    }

    public function setSpouseBirthdateAttribute($value){
        $this->attributes['spouse_birthdate'] = Carbon::parse($value);
    }

    public function setExpiryDateAttribute($value){
        $this->attributes['expiry_date'] = Carbon::parse($value);
    }

    public function setContactNumberAttribute($value){
        $this->attributes['contact_number'] = '+63'.$value;
    }

    public function setAgeAttribute($value){
        $this->attributes['age'] = Carbon::parse($value)->age;
    }

    public function setEmergencyContactnoAttribute($value){
        $this->attributes['emergency_contactno'] = '+63'.$value;
    }

}
