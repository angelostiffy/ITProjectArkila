<?php

namespace App\Http\Controllers\CustomerModuleControllers;

use App\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewAnnouncementsController extends Controller
{
	public function showAnnouncement()
	{
		$announcements = Announcement::latest()->where('viewer', '=', 'Public')->orWhere('viewer', '=', 'Customer Only')->get();
    	return view('customermodule.user.indexAnnouncements', compact('announcements'));
	}
}
