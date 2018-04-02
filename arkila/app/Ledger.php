<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Ledger extends Model
{
    protected $table = 'ledger';
    protected $primaryKey = 'ledger_id';
    protected $guarded = [
        'ledger_id',
    ];

    public function getTotalRevenueAttribute(){
        $now = Carbon::now()->format('Y-m-d');
        return $this->where('type', 'Revenue')
        ->where('created_at', 'like', $now . '%')
        ->sum('amount');
    }

    public function getTotalExpenseAttribute(){
        $now = Carbon::now()->format('Y-m-d');
        return $this->where('type', 'Expense')
        ->where('created_at', 'like', $now . '%')
        ->sum('amount');
    }

    public function getBalanceAttribute(){
        return $this->total_revenue - $this->total_expense;
    }

    public function getGledgerTotalRevenueAttribute(){
        return $this->where('type', 'Revenue')->sum('amount');
    }
    public function getGledgerTotalExpenseAttribute(){
        return $this->where('type', 'Expense')->sum('amount');
    }

    public function getGledgerTotalBalanceAttribute(){
        return $this->gledger_total_revenue - $this->gledger_total_expense;
    }
    
    public function getBookingFeeAttribute() {
        $now = Carbon::now()->format('Y-m-d');
        return $this->where('description', 'Booking Fee')
        ->where('created_at', 'like', $now . '%')
        ->groupBy('description')
        ->sum('amount');
    }
    
    public function getSopAttribute() {
        $now = Carbon::now()->format('Y-m-d');
        return $this->where('description', 'SOP')
        ->where('created_at', 'like', $now . '%')
        ->groupBy('description')
        ->sum('amount');
    }

    public function getExpiredTicketAttribute() {
        $now = Carbon::now()->format('Y-m-d');
        return $this->where('description', 'Expired Ticket')
        ->where('created_at', 'like', $now . '%')
        ->groupBy('description')
        ->sum('amount');
    }
    
    public function scopeAllBooking($query) {
        return $query->where('description', 'Booking Fee')->orWhere('description', 'SOP')->groupBy(DB::raw('day(created_at)'), DB::raw('month(created_at)'), DB::raw('year(created_at)'));
    }
    
    public function getBookAttribute() {
        return $this->where('description', 'Booking Fee')
        ->groupBy(DB::raw('day(created_at)'), DB::raw('month(created_at)'), DB::raw('year(created_at)'))
        ->sum('amount');
    }
}
