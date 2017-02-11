<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Student;
use App\StudStuff;
use Carbon\Carbon;
use App\Department;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = new User;
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->user_name = $data['user_name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->save();
        if($data['as'] == 'student')
        {
            $student = new Student;
            $student->stud_id = $user->id;
            $student->entrance_year = Carbon::now();
            $student->reputation = 0;
            $student->department_id = 1;
            $student->save();
        }
        else if($data['as'] == 'stuff')
        {
            $stuff = new StudStuff;
            $stuff->stuff_id = $user->id;
            $stuff->edu_level = $data['edu_level'];
            if($dep = Department::where('dep_name', $data['dep_name'])->first())
            {
                $stuff->dept_id = $dep->dep_id;
            }
            
            $stuff->save();

        }
        return $user;
    }
}
