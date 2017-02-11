<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\Department;
use App\Course;
use App\Student;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
        session()->flash('all_departments', Department::all());
        session()->flash('all_courses', Course::all());
        session()->flash('students', Student::all());

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active_side = 'none';
        if(Auth::user()->stud_stuff)
        {
            $active_side = 'department';
            $stud_stuff = Auth::user()->stud_stuff->load('departments');
            return view('department.departments', compact('active_side'), compact('stud_stuff'));
        }
        return view('home', compact('active_side'));
    }

    public function getProfile()
    {
        $active_side = 'none';
        return view('user.profile', compact('active_side'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' =>'required|max:50',
            'last_name' => 'required|max:50', 
            'user_name' => 'required|max:50',
            'email' => 'required|email|max:100',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'user_name' => $data['user_name'],
            'email' => $data['email'],
        ]);
    }

    public function editProfile(Request $request)
    {
        $user = Auth::user();
        if($student = $user->student)
        {
            $this->validator($request->all())->validate();
            $department = Department::find($request['student_department']);
            $student->department_id = $department->dep_id;
            $student->save();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->user_name = $request->user_name;
            $user->email = $request->email;
            $user->save();
            $this->changeAvatar($request);
            
        }
        else
        {
            $this->validator($request->all())->validate();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->user_name = $request->user_name;
            $user->email = $request->email;
            $user->save();
            $this->changeAvatar($request);
        }
        return redirect()->back();
    }

    public function changeAvatar(Request $request)
    {
        if($request->hasFile('avatar'))
        {
            $avatar = $request['avatar'];
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/img/profile/' . $filename));
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        else{
            return 'avatar not changed';
        }
        return redirect()->back();
    }
}
