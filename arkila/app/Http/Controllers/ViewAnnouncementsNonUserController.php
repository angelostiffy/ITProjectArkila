<?php

namespace App\Http\Controllers;


use App\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewAnnouncementsNonUserController extends Controller
{
    public function showAnnouncement()
    {
    	$announcements = Announcement::latest()->where('viewer', '=', 'Public')->get();
    	return view('customermodule.user.indexAnnouncements', compact('announcements'));
    }
}
