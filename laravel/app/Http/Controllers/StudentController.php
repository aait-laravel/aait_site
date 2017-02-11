<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;
use App\Text;
use App\Message;
use Auth;

class StudentController extends Controller
{

    public function show(){
        $students = Student::all();
        return view('studs', compact('students'));
    }

    public function texts(){
        $student = Student::find(1);
        $student->load('texts.student');
        return $student;
    }

    public function sendMail(Request $request)
    {
        $this->validate($request, [
            'priv_body' => 'required',
        ]);
        $user = User::where('user_name', $request->student)->first();
        if($user){

            $student = $user->student;
            if($student)
            {
                $user = Auth::user();
                $text = Text::addText($request['priv_body'], $user->id);
                $subject = $request->subject;
                $text->message()->save(new Message)->private_message()->create(['dest_id'=>$student->stud_id, 'subject'=>$subject]);
            }
            else if ($stud_stuff = $user->stud_stuff) {
                $user = Auth::user();
                $text = Text::addText($request['priv_body'], $user->id);
                $subject = $request->subject;
                $text->message()->save(new Message)->private_message()->create(['dest_id'=>$stud_stuff->stuff_id, 'subject'=>$subject]);
            }
        }
        else{
            session()->flash('mail_message', 'User not Found!');
            return redirect()->action('MessageController@getMailing');
        }
        return redirect()->back();
    }

    public function getComposeMailForm()
    {
        
        return ;
    }

    public function deleteRecievedMail()
    {
        
        return ;
    }

    public function sendChatMessage(Request $request)
    { 
        $this->validate($request, [
            'student' => 'required',
            'chat_body' => 'required',
        ]);
        $student = User::find($request['student']);
        $user = Auth::user();
        $text = Text::addText($request['chat_body'], $user->id);
        $sent = $text->message()->save(new Message)->chat_message()->create(['dest_id'=>$student->id]);

               return $this->getChatMessage($request,$request['student']);

    }
    public function test()
    {
    
        return view('simpleform');
    }
    public function getChatMessage(Request $request, $receiver_id)
    {   
       

        $student = Auth::user()->student;
        $user = Auth::user();
        if($student)
        {
            $student_received_messages = json_encode($student->chat_received($receiver_id));
            $student_sent_messages = json_encode($student->chat_sent($receiver_id));
            return response()->json(['received_messages'=>$student_received_messages, 'sent_messages'=>$student_sent_messages], 200);
            
        } 
        return null;
    }

    public function createGroup(Request $request)
    {
        $student = Auth::user()->student;
        $student->createGroup($request['group_name']);
        return redirect()->back();
    }

    public function deleteGroup(GroupChat $group)
    {
        //delete here
        $student = Auth::user()->student;
        return ;
    }

    public function sendGroupMessage(Request $request)
    {
        
        return ;
    }

    public function joinGroup()
    {
        
        return ;
    }

    public function leaveGroup()
    {
        return ;
    }


}
