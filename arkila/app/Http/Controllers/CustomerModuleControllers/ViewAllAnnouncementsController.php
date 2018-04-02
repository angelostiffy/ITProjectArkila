<?php

namespace App\Http\Controllers\CustomerModuleControllers;

use App\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewAllAnnouncementsController extends Controller
{
    public function viewAnnouncements()
    {
      $announcements = Announcement::latest()->where('viewer', '=', 'Public')
                                    ->orWhere('viewer', '=', 'Customer Only')->get();
        return view('customermodule.user.indexAllAnnouncements', compact('announcements'));
    }
}
