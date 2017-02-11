<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class UserController extends Controller
{

	public function showStudentRegistrationForm()
	{
		$departments = Department::all();
		return view('user.student_registration', compact('departments'));
	}

	public function userSignUp(Request $request)
	{
		return ;
	}
    public function studentSignUp(Request $request)
    {
    	return ;
    }

    public function stuffSignUp(Request $request)
    {
    	return ;
    }

    public function onlineUsers(Request $request)
    {
    	$online_users = User::where('online', true)->get();
    	if(Request::ajax())
    	{
    		return $online_users;
    	}
    	//return $online_users;
    }
}
