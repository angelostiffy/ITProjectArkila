<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $table = 'rental';
    protected $primaryKey = 'rent_id';
    protected $guarded = [
        'rent_id',
    ];
}
