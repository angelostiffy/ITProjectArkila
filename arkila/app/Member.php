<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';
    protected $primaryKey = 'member_id';

    public function van(){
        return $this->belongsToMany(Van::class,'member_van','member_id','plate_number');
    }
}
