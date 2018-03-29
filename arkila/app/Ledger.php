<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    protected $table = 'ledger';
    protected $primaryKey = 'ledger_id';
    protected $guarded = [
        'ledger_id',
    ];

    public function getTotalRevenueAttribute(){
        return $this->where('type', 'Revenue')->sum('amount');
    }

    public function getTotalExpenseAttribute(){
        return $this->where('type', 'Expense')->sum('amount');
    }

    public function getBalanceAttribute(){
        return $this->total_revenue - $this->total_expense;
    }

}
