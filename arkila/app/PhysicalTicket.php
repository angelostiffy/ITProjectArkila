<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhysicalTicket extends Model
{
    protected $table = 'physical_ticket';
    protected $primaryKey = 'physical_ticket_id';

    public function ticket(){
    	return $this->hasMany(Ticket::Class, 'ticket_number');
    }

}
