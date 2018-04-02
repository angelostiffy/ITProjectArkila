<?php

namespace App\Http\Controllers\CustomerModuleControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewAllAnnouncementsController extends Controller
{
    public function viewAnnouncements()
    {
        return view('customermodule.user.indexAllAnnouncements');
    }
}
