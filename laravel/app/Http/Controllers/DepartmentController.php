<?php
namespace App\Http\Controllers;

use App\Text;
use App\Department;
use App\DepartmentPost;
use App\Announcement;
use App\News;
use App\DepartmentPublicMessage;
use App\DepartmentProtest;
use App\DepartmentQuestion;
use App\Post;
use App\Course;
use App\Question;
use App\Answer;
use App\User;
use Auth;
use DB;
use Image;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $department;

    public function __construct()
    {
        $this->middleware('auth');
        session()->flash('all_departments', Department::all());
        session()->flash('all_courses', Course::all());
        session()->flash('all_online_students', User::where('online', true)->get());
    }

    public function getDepartments()
    {
    	$departments = Department::all();
        $active_side = 'departments';
    	return view('department.departments', compact('active_side'), compact('departments'));
    }

    public function departmentHome($department_name)
    {
        $department = Department::where('dep_name', $department_name)->first();
        if($department)
        {
            $active_side = 'departments';
            $department->with('courses')->get();
            return view('department.department_home', compact('active_side'), compact('department'));
        }
        else
        {
            return 'error no such department'.$department;
        }
        
    }

    public function addDepartment(Request $request)
    {
        if($stuff = Auth::user()->stud_stuff)
        {
            $stuff->addDepartment(new Department($request->all()));
        }
        return redirect()->back();
    }

    public function editDepartmentForm($department_name)
    {
        $department = Department::where('dep_name', $department_name)-first();
        if($department)
        {
            return view('department.depedit', compact('department'));
        }
        return redirect()->back();
    }

    public function editDepartment(Request $request, $department_name)
    {
        //edition logic here
        return redirect()->back();
    }

    public function deleteDepartment(Request $request, $department_name)
    {
        $department = Department::where('dep_name', $department_name)->first();
        if($department)
        {
            $department->delete();
            return redirect()->back();
        }

        return redirect()->back();        
    }
    
    public function addCourse(Request $request, $department_name)
    {
        $department = Department::where('dep_name', $department_name)->first();
        if(($stuff = Auth::user()->stud_stuff) && ($department))
        {
            $department->addCourse(new Course($request->all()));
        }
        
        return redirect()->back();
    }

    public function getStudAnnouncements()
    {
        $student = Auth::user()->student;
        if($student)
        {
            $department = $student->department;
            return redirect()->action('DepartmentController@getAnnouncements', ['department_name'=>$department->dep_name]);
        }
        else if($stud_stuff = Auth::user()->stud_stuff)
        {
            $departments = $stud_stuff->departments;
            if(count($departments) > 0)
            {
                $department = $departments[0];
                return redirect()->action('DepartmentController@getAnnouncements', ['department_name'=>$department->dep_name]);
            }
            else
            {
                return redirect()->action('DepartmentController@getDepartments');
            }

        }
        return ;
    }

    public function getAnnouncements($department_name)
    {
        $department = Department::where('dep_name', $department_name)->first();
        if($department)
        {
            $active_side = 'announcements';
            $department->load('department_announcements');
            return view('department.announcement', compact('active_side'), compact('department'));
        }
    	$announcements  = Announcement::all();
    	return $announcements;
    }

    public function followAnnouncement($department_name, Announcement $announcement)
    {
        $student = Auth::user()->student;
        if($student)
        {
            //follow logic here;
        }
        return redirect()->back();
    }

    public function getNews()
    {
    	$news = News::all();
    	return $news;
    }


/********             Posts         *****/

    public function getStudPosts()
    {

        $student = Auth::user()->student;
        if($student)
        {
        $department = $student->department;

        return redirect()->action('DepartmentController@getPosts', ['department_name'=>$department->dep_name]);
    }
        return 'notstudent';

    }
    public function getPosts($department_name)
    {
        $department = Department::where('dep_name', $department_name)->first();
        if($department)
        {
            $department->load('department_posts');
            // return $department;
            $student = Auth::user()->student;
            $active_side = 'posts';
            return view('department.posts', compact('active_side'), compact('department'), compact('student'));
        }
    	return redirect()->back();
    }

    public function addPost(Request $request, $department_name)
    {
        $this->validate($request, [
            'text_body' => 'required',
        ]);
        $department = Department::where('dep_name', $department_name)->first();
        $student = Auth::user()->student;
        if($department && $student)
        {
            $text = Text::addText($request->text_body, $student->stud_id);
            
            if($request->hasFile('post_image'))
            {
                $image = $request['post_image'];
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(300, 300)->save(public_path('/img/text/' . $image_name));
                $text->addFile($image_name);
            }
            $department->addPost($text);
        }
        
        return redirect()->back();
    }

    public function deletePost(Request $request, $department_name, Text $text)
    {
        $department = Department::where('dep_name', $department_name)->first();
        if($department)
        {
            $text->post->department_post->delete();
            DB::table('followed_text')->where('followed_text_id', $text->text_id)->delete();
            DB::table('liked_text')->where('liked_text_id', $text->text_id)->delete();
            $comments = $text->post->comments();
            if(count($comments) > 0)
            {
                foreach($comments as $comment)
                {
                    $comment->text->delete();
                    $comment->delete();
                }
            }

            $text->post->delete();
            $text->delete();
        }
        return redirect()->back();
    }

/*********  End posts *****/

/****      Discussion part ******/

    public function getStudDiscussions()
    {
        $student = Auth::user()->student;
        if($student)
        {
            $department = $student->department;
            return redirect()->action('DepartmentController@getDiscussion', ['department_name'=>$department->dep_name]);
        }

        return redirect()->action('PublicController@getDiscussion');
        
    }
    public function getDiscussion($department_name)
    {
        $department = Department::where('dep_name', $department_name)->first();
        if($department)
        {
            $active_side = 'discussion';
            $department->load('department_public_messages');
            return view('department.discussion', compact('active_side'), compact('department'));
        }
        return redirect()->back();
    }

    public function addPublicMessage(Request $request, $department_name)
    {
        $this->validate($request, [
            'message_body' => 'required',
        ]);
        $department = Department::where('dep_name', $department_name)->first();
        if($department)
        {
            $student = Auth::user()->student;
            $text = Text::addText($request['message_body'], $student->stud_id);
            $department->addPublicMessage($text);
        }
        
        return redirect()->back();
    }

    public function deletePublicMessage($department_name, Text $message)
    {
        $message->message->public_message->department_public_message->delete();
        $message->message->public_message->delete();
        $message->message->delete();
        $message->delete();
        return redirect()->back();
    }

/******* end Discussion ********/

    public function getProtests($department_name)
    {
        $department = Department::where('dep_name', $department_name);
        $department->load('department_protests');
        return $department;
    }

    public function requestProtest(Request $request, $department_name)
    {
        $stident = Auth::user()->student;
        $department = Department::where('dep_name', $department_name)->first();
        if($student && $department)
        {
            //protest logic here
            return 'succss';
        }
        return redirect()->back();
    }

    public function getStudQuestions()
    {
        $student = Auth::user()->student;
        if($student)
        {
            $department = $student->department;
            return redirect()->action('DepartmentController@getQuestions', ['department_name'=>$department->dep_name]);
        }
        return redirect()->back();
    }

    public function getQuestions($department_name)
    {
        $department = Department::where('dep_name', $department_name)->first();
        if($department){
            $department->load('department_questions');
            $active_side = 'questions';
            return view('department.questions', compact('active_side'), compact('department'));
        }
    	return redirect()->back();
    }

    public function addQuestion(Request $request, $department_name)
    {
        $this->validate($request, [
            'ques_body' => 'required',
        ]);
        $department = Department::where('dep_name', $department_name)->first();
        $student = Auth::user()->student;
        if($department && $student)
        {
            $text = Text::addText($request['ques_body'], $student->stud_id);
            if($request->hasFile('ques_image'))
            {
                $image = $request['ques_image'];
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(300, 300)->save(public_path('/img/text/' . $image_name));
                $text->addFile($image_name);
            }
            $department->addQuestion($text);
        }
        return redirect()->back();
    }

    public function deleteQuestion($department_name, Text $question)
    {
        $student = Auth::user()->student;
        if($student->user_id == $question->user_id)
        {
            $question->question->department_question->delete();
            $question->question->delete();
            $question->delete();
        }
        
        return redirect()->back();
    }

    public function answerQuestion(Request $request, $department_name, Question $question)
    {
        $this->validate($request, [
            'ans_body' => 'required',
        ]);
        $department = Department::where('dep_name', $department_name)->first();
        $student = Auth::user()->student;
        if($department && $student)
        {
            $text = Text::addText($request->ans_body, $student->stud_id);
            $text->answer()->create(['ques_id'=>$question->id]);
        }
        return redirect()->back();
    }

    public function approveAnswer($department_name, Question $question, Answer $answer)
    {
        $student = Auth::user()->student;
        if($student)
        {
            if($student->stud_id == $question->text->user_id)
            {
                $question->ans_id = $answer->ans_id;
                $question->answered = true;
                $question->save();
            }
           // return 'success';
        }
        return redirect()->back();
    }

    public function deleteAnswer($department_name, Text $question, Text $answer)
    {
        $student = Auth::user()->student;
        if(($student->user_id == $question->user_id) | ($student->user_id == $answer->user_id))
        {
            if($question->question->ans_id == $answer->answer->ans_id)
            {
                $question->question->ans_id = null;
                $question->save();
            }
            $answer->answer->delete();
            $answer->delete();
            return 'succss';
        }
        return redirect()->back();
    }

    public function createDepartmentGroup(Request $request)
    {
        
        return ;
    }

    public function deleteDepartmentGroup()
    {
        
        return ;
    }

    public function leaveDepartmentGroup()
    {
        
        return ;
    }
    
}