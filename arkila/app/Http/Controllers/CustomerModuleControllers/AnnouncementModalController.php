<?php

namespace App\Http\Controllers\CustomerModuleControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnnouncementModalController extends Controller
{
    public function showModalAnnouncement()
    {
        return view('customermodule.user.indexAnnouncementModal');
    }
}
