<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Announcement;
use App\Department;

class AnnouncementController extends Controller
{
    public function announce(Request $request, $department_name)
    {
    	$stud_stuff = Auth::user()->stud_stuff;
    	$department = Department::where('dep_name', $department_name)->first();
    	if($stud_stuff)
    	{
    		$announcement = new Announcement;
    		$announcement->body = $request->announ_body;
    		$announcement->subject = $request->subject;
    		$announcement->stuff_id = $stud_stuff->stuff_id;
    		$announcement->announ_tag_id = $department_name;
    		$announcement->save();
    		$announcement->department_announcements()->create(['dep_id'=>$department->dep_id]);
    	}
    	return redirect()->back();
    }
}
