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
    
    public function trips(){
      return $this->hasMany(Trip::class, 'driver_id', 'member_id');
    }

    public function user(){
      return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function countDriverTrip(){
      return $this->trips();
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
        if(is_null($value)){
            return null;
        }
        else {
            return Carbon::parse($value)->format('m/d/Y');
        }

    }

    public function getExpiryDateAttribute($value){
        return Carbon::parse($value)->format('m/d/Y');
    }

    public function setBirthDateAttribute($value){
        $this->attributes['birth_date'] = Carbon::parse($value);
    }

    public function setSpouseBirthdateAttribute($value){
        if(is_null($value)){
            $this->attributes['spouse_birthdate'] = $value;
        }
        else{
            $this->attributes['spouse_birthdate'] = Carbon::parse($value);
        }

    }

    public function setExpiryDateAttribute($value){
        $this->attributes['expiry_date'] = Carbon::parse($value);
    }

    public function setContactNumberAttribute($value){
        $contactArr = explode('-',$value);
        $this->attributes['contact_number'] = '+63'.$contactArr[0].$contactArr[1].$contactArr[2];
    }

    public function setAgeAttribute($value){
        $this->attributes['age'] = Carbon::parse($value)->age;
    }

    public function setEmergencyContactnoAttribute($value){
        $contactArr = explode('-',$value);
        $this->attributes['emergency_contactno'] = '+63'.$contactArr[0].$contactArr[1].$contactArr[2];
    }

    public function archivedOperator() {
        return $this->hasMany(ArchiveMember::class, 'operator_id');

    }

    public function archivedDriver() {
        return $this->hasMany(ArchiveMember::class, 'driver_id');

    }
}
