<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;

class AnnouncementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $announce = Announcement::all();
        return view('announcements.index', compact('announce'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $announce = Announcement::all();
        return view('announcements.create', compact('announce'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());

        Announcement::create ([
            'description' => $request->announce,
            'viewer' => $request->viewer,
        ]);

        return redirect('/home/announcements/create')->with('success', 'Information created successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Announcement  $announce
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announce)
    {
        //
        return view('announcements.show', compact('announce'));

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Announcement  $announce
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announce)
    {
        //
        return view('announcements.edit', compact('announce'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Announcement  $announce
     * @return \Illuminate\Http\Response
     */
    public function update(Announcement $announce)
    {
        //
        $announce->update([
            'description' => request('description'),
            'viewer' => request('viewer'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Announcement  $announce 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
    	return back();
    }
}
