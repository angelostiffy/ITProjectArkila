<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchiveMember extends Model
{
    protected $table = 'archive_member';
    protected $primaryKey = 'archive_member_id';
    protected $fillable = [
    	'driver_id',
        'operator_id',
        'archived',
    ];
    
    public function archiveVan(){
        return $this->belongsToMany(ArchiveVan::class,'archive_member_van','member_id','plate_number');
    }

    public static function scopeAllOperators($query){
        return $query->where('archived','Operator');
    }

    public function operator(){
        return $this->belongsTo(Member::class, 'operator_id', 'member_id');
    }

    public function drivers(){
        return $this->belongsTo(Member::class, 'driver_id', 'member_id');
    }

}
