<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchiveVan extends Model
{
    protected $table = 'archive_van';
    protected $primaryKey = 'archive_van_id';
    protected $fillable = [
        'plate_number',
        'archived',
    ];

    public function archiveMember(){
        return $this->belongsToMany(ArchiveMember::class,'archive_member_van','plate_number','member_id');
    }

}
