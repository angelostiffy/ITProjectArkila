<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'ticket';
	protected $primaryKey = 'ticket_number';
	protected $guarded = ['ticket_number'];
	public function destinations()
	{
		return $this->belongsTo(Destination::class, 'destination_id');
	}

	public function feesAndDeduction()
	{
		return $this->belongsTo(FeesAndDestination::class, 'fad_id');
	}

	public function trip()
	{
		return $this->belongsTo(Trip::class, 'trip_id');
	}
}
