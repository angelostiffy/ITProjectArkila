<?php

namespace App\Http\Controllers\CustomerModuleControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerUserHomeController extends Controller
{
    public function index()
    {
    	return view('customermodule.user.index');
    }
}
