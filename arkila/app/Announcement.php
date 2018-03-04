<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    //
    protected  $table = 'announcement';
    protected $primaryKey = 'announcement_id';
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = false;
	protected $keyType = 'String';
    protected $fillable = [
        'title',
        'description',
        'viewer',
        'created_at',
        'updated_at',
    ]; 
    
}
