<?php

namespace App;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
class Dependent extends Model
{
    protected $fillable = [
        'member_id',
        'children_name',
        'birthdate',
    ];
    public $incrementing = false;
    protected $table = 'dependent';
    protected $primaryKey = 'member_id';
    public $timestamps = false;

    public function parent(){
        return $this->belongsTo(Member::class,'member_id','member_id');
    }
    public function setBirthdateAttribute($value){
        if(is_null($value)){
            $this->attributes['birthdate'] = $value;
        }
        else{
            $this->attributes['birthdate'] = Carbon::parse($value);
        }

    }

    public function getBirthdateAttribute($value){
        if(is_null($value)){
            return $value;
        }
        else{
            return  Carbon::parse($value)->format('m/d/Y');
        }

    }

}
