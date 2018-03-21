<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $table = 'archive';
    protected $primaryKey = 'archive_member_id';
    protected $fillable = [
    	'driver_id',
        'operator_id',
        'archived',
    ];
}
