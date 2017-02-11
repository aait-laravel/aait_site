<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Student;
class MessageController extends Controller
{

	public function getMailing()
	{
		$student = Auth::user()->student;
        if($student)
        {
            $active_side = 'mail';
            $students = Student::all();
            $stud_messages = $student->private_messages;
            $joined_groups = $student->groups();
            $student_groups = $student->group_chats;
            return view('mail.mails', ['active_side'=>$active_side, 'student'=>$student, 'students'=>$students, 'private_messages'=>$stud_messages, 'groups'=>$joined_groups, 'student_groups'=>$student_groups]);
        }
		
	}
    public function getGroups()
    {
    	$student = Auth::user()->student;
    	$groups = $student->groups();
    	return $groups;
    }

    public function getMessages(GroupChat $group)
    {
    	$group->load('group_messages');
    	return $group;
    }


}
