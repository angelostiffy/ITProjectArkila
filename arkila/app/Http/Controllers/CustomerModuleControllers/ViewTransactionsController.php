<?php

namespace App\Http\Controllers\CustomerModuleControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewTransactionsController extends Controller
{
    public function viewTransactions()
    {
    	return view('customermodule.user.transactions.customerTransactions');	
    }
}
