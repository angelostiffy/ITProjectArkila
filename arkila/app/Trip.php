<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
class Trip extends Model
{
    //
    protected $table = 'trip';
    protected $primaryKey = 'trip_id';
    protected $guarded = [
        'trip_id',
    ];

    // protected $fillable = [
    //     'driver_id', 'terminal_id', 'plate_number', 'remarks', 'status', 'total_passengers', 'total_booking_fee', 'community_fund', 'date_departed', 'queue_number'
    // ];

    public function van(){
    	return $this->belongsTo(Van::class, 'plate_number');
    }

    public function destination(){
    	return $this->belongsTo(Destination::class, 'destination_id');
    }

    public function terminal(){
      return $this->belongsTo(Terminal::class, 'terminal_id');
    }

    public function driver(){
      return $this->belongsTo(Member::class,  'driver_id', 'member_id');
    }
    public function ticket(){
        return $this->hasMany(Ticket::class, 'trip_id');
    }

    public function transactions()
    {
      return $this->hasMany(Transaction::class, 'trip_id');
    }

    public function getDateDepartedAttribute($value)
    {
      return Carbon::parse($value)->toFormattedDateString();
    }

    public function getTimeDepartedAttribute($value)
    {
      return Carbon::parse($value)->format('g:i A');
    }


    public function setDateDepartedAttribute($value)
    {
      $this->attributes['date_departed'] = Carbon::parse($value);
    }


}
