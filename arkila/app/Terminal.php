<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    //
    protected $table = 'terminal';
    protected $primaryKey = 'terminal_id';

    public function destination()
    {
    	return $this->hasMany(Destination::class, 'destination_id');
    }

}
