<?php

namespace App\Http\Controllers\DriverModuleControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Destination;
use App\Announcement;
use App\Terminal;
use App\Trip;

class DriverHomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth::driver');
    // }

    public function index()
    {
      return view('drivermodule.index');
    }
}
