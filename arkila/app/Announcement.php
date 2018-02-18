<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    //
    protected $primaryKey = 'announcement_id';
    
    protected $fillable = [
        'description',
        'viewer',
    ];  
}
