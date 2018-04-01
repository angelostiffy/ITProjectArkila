<?php

namespace App\Http\Controllers\DriverModuleControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewDriverHelpController extends Controller
{
    public function viewDriverHelp()
    {
        return view('drivermodule.help.driverHelp');
    }
}
