<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchiveVan extends Model
{
    protected $table = 'archive_van';
    protected $primaryKey = 'archive_van_id';
    protected $guarded = [
        'archive_van_id',
    ];

    public function archiveVan(){
        return $this->belongsToMany(ArchiveMember::class,'archive_member_van','archive_van_id','archive_member_id');
    }

}
