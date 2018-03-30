<?php

namespace App\Http\Controllers\CustomerModuleControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewHelpController extends Controller
{
    public function viewHelp()
    {
    	return view('customermodule.user.help.customerHelp');
    }
}
