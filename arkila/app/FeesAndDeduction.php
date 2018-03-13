<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeesAndDeduction extends Model
{
    protected $table = 'fees_and_deduction';
	protected $primaryKey = 'fad_id';    //
    protected $guarded = [
      'fad_id',
    ];

    public function ticket()
    {
    	return $this->hasMany(Ticket::class, 'fad_id');
    }
}
