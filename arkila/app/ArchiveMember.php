<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchiveMember extends Model
{
    protected $table = 'archive_member';
    protected $primaryKey = 'archive_member_id';
    protected $guarded = [
        'archive_member_id',
    ];

    public function archiveVan(){
        return $this->belongsToMany(ArchiveVan::class,'archive_member_van','archive_member_id','archive_van_id');
    }

}
