<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';
    protected $primaryKey = 'transaction_id';
    protected $guarded = ['transaction_id'];
    // protected $fillable = [
    //   'terminal_id',
    //   'ticket_id',
    //   'destination_id',
    //   'fad_id',
    //   'trip_id',
    //   'status',
    // ];
    public function destination()
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

    public function ticket()
    {
        return $this->belongsTo(Ticket::Class, 'ticket_id');
    }

    public function terminal(){
        return $this->belongsTo(Terminal::Class, 'terminal_id');
    }
}
