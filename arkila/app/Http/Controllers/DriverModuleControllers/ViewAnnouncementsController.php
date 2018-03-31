<?php

namespace App\Http\Controllers\DriverModuleControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Announcement;
class ViewAnnouncementsController extends Controller
{
    public function showAnnouncement()
    {
      $announcements = Announcement::latest()->where('viewer', '=', 'Public')->orWhere('viewer', '=', 'Driver Only')->get();
      return view('drivermodule.indexAnnouncements', compact('announcements'));
    }
}
