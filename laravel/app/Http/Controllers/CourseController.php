<?php

namespace App\Http\Controllers;

use App\Text;
use App\Course;
use App\Announcement;
use App\Question;
use App\Answer;
use App\Department;
use Carbon\Carbon;
use Auth;
use DB;

use Illuminate\Http\Request;

class CourseController extends Controller
{
	public function __construct()
    {
        session()->flash('all_departments', Department::all());
    }

	public function getCourse($department, Course $course)
	{
		$course->load('course_posts');
		$course->load('course_questions');
		$course->load('course_public_messages');
		$course->load('course_protests');
		return view('course.course', compact('course'));
	}

	public function getDepartmentCourses($department_name, $display)
	{
		$department = Department::where('dep_name', $department_name)->first();
		$department->load('courses');
		$active_side = $display;
		return view('course.courses', compact('active_side'), compact('department'));
	}

	public function getStudCourses(Request $request)
	{
		$student = Auth::user()->student;
		if($student)
		{
			$department = $student->department;
			$department->load('courses');
			$active_side = 'discussion';
			return view('course.courses', compact('active_side'), compact('department'));
		}
		return "error not a student";
	}

	public function courseHome($department_name, $course_name)
	{
		$department = Department::where('dep_name', $department_name)->first();
		$course = Course::where('course_name', $course_name)->where('dep_id', $department->dep_id);
		return $course;
	}

	public function editCourseForm($department_name, $course_name)
	{
		$department = Department::where('dep_name', $department_name)->first();
		$course = Course::where('course_name', $course_name)->where('dep_id', $department->dep_id);
		$staf = Auth::user()->stud_stuff;
		return $course;
	}

	public function editCourse(Request $request, $department_name, $course_name)
	{
		$department = Department::where('dep_name', $department_name)->first();
		$course = Course::where('course_name', $course_name)->where('dep_id', $department->dep_id);
		$stuf = Auth::user()->stud_stuff;
		return 'edited';
	}

	public function getPosts($department_name, $course_name)
	{
		$department = Department::where('dep_name', $department_name)->first();
		$course = Course::where('course_name', $course_name)->where('dep_id', $department->dep_id)->first();
		$course->load('course_posts');
		$active_side = 'posts';
		$now = Carbon::now();
		$now = date('F j, Y g:i a', strtotime($now));

		return view('course.posts', ['active_side'=>$active_side, 'course'=>$course, 'now'=>$now]);
	}

	public function getStudPosts()
	{
		$student = Auth::user()->student;
		if($student)
		{
			$department = $student->department;
			$department->load('courses');
			$active_side = 'posts';
			$now = Carbon::now();
			return view('course.courses', compact('active_side'), compact('department'));
		}
		return "error not a student";
	}

	public function addPost(Request $request, $department_name, $course_name)
	{
		$this->validate($request, [
            'text_body' => 'required',
        ]);
		$department = Department::where('dep_name', $department_name)->first();
		$course = Course::where('course_name', $course_name)->where('dep_id', $department->dep_id)->first();
		//add here
		$student = Auth::user()->student;
		if($student)
		{
			$text = Text::addText($request['text_body'], $student->stud_id);
			if($request->hasFile('post_image'))
            {
                $image = $request['post_image'];
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(300, 300)->save(public_path('/img/text/' . $image_name));
                $text->addFile($image_name);
            }
			$course->addPost($text);
			return redirect()->back();
		}	
		return 'error';
	}

	public function deletePost($department_name, $course_name, Text $text)
	{
		$department = Department::where('dep_name', $department_name)->first();
		$course = Course::where('course_name', $course_name)->where('dep_id', $department->dep_id)->first();
		//delete here
		$student = Auth::user()->student;
		if($student && ($student->stud_id == $text->user_id))
		{
			$text->post->course_post->delete();

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

	public function getDiscussion($department_name, $course_name)
	{
		$department = Department::where('dep_name', $department_name)->first();
		$course = Course::where('course_name', $course_name)->where('dep_id', $department->dep_id)->first();
		$course->load('course_public_messages');
		$active_side = 'discussion';
		return view('course.discussion', compact('active_side'), compact('course'));
	}

	public function addPublicMessage(Request $request, $department_name, $course_name)
	{
		$this->validate($request, [
            'message_body' => 'required',
        ]);
		$department = Department::where('dep_name', $department_name)->first();
		$course = Course::where('course_name', $course_name)->where('dep_id', $department->dep_id)->first();
		if($department)
		{
			$student = Auth::user()->student;
			$text = Text::addText($request['message_body'], $student->stud_id);
            $course->addPublicMessage($text);
		}
		
		return redirect()->back();
	}

	public function deletePublicMessage($department_name, $course_name, Text $message)
	{
		$department = Department::where('dep_name', $department_name)->first();
		$course = Course::where('course_name', $course_name)->where('dep_id', $department->dep_id)->first();
		$student = Auth::user()->student;
		if($student && $student->stud_id == $message->user_id)
		{
			$message->message->public_message->course_public_message->delete();
	        $message->message->public_message->delete();
	        $message->message->delete();
	        $message->delete();
		}

		return redirect()->back();
	}

	public function getStudQuestions()
	{
		$student = Auth::user()->student;
		if($student)
		{
			$department = $student->department;
			$department->load('courses');
			$active_side = 'questions';
			return view('course.courses', compact('active_side'), compact('department'));
		}
		return "error not a student";
	}

	public function getQuestions($department_name, $course_name)
	{
		$department = Department::where('dep_name', $department_name)->first();
		$course = Course::where('course_name', $course_name)->where('dep_id', $department->dep_id)->first();
		$course->load('course_questions');
		$active_side = 'questions';
		return view('course.questions', compact('active_side'), compact('course'));
	}

	public function addQuestion(Request $request, $department_name, $course_name)
	{
		$this->validate($request, [
            'ques_body' => 'required',
        ]);
		$department = Department::where('dep_name', $department_name)->first();
		$course = Course::where('course_name', $course_name)->where('dep_id', $department->dep_id)->first();
		//add question here
		$student = Auth::user()->student;
		$text = Text::addText($request['ques_body'], 1);
		$text->question()->save(new Question)->course_question()->create(['$course_id'=>$course->course_id]);
		
		return redirect()->back();
	}

	public function deleteQuestion($department_name, $course_name, Text $question)
	{
		$department = Department::where('dep_name', $department_name)->first();
		$course = Course::where('course_name', $course_name)->where('dep_id', $department->dep_id);
		//delete here
		$student = Auth::user()->student;
		return redirect()->back();
	}

	public function answerQuestion(Request $request, $department_name, $course_name, Question $question)
	{
		$department = Department::where('dep_name', $department_name)->first();
		$course = Course::where('course_name', $course_name)->where('dep_id', $department->dep_id)->first();
		//answer here
		$student = Auth::user()->student;
		return redirect()->back();
	}

	public function deleteAnswer($department_name, $course_name, Question $question, Answer $answer)
	{
		//delete here
		$student = Auth::user()->student;
		return redirect()->back();
	}

	public function getProtests($department_name, $course_name)
	{
		$department = Department::where('dep_name', $department_name)->first();
		$course = Course::where('course_name', $course_name)->where('dep_id', $department->dep_id)->first();
    	$course->load('course_protests');
		return $course;
	}

	public function requestProtest(Request $request, $department_name, $course_name)
	{
		$department = Department::where('dep_name', $department_name)->first();
		$course = Course::where('course_name', $course_name)->where('dep_id', $department->dep_id)->first();
		//request logic here
		return redirect()->back();
	}

	public function getAnnouncements($department_name, $course_name)
	{
		$department = Department::where('dep_name', $department_name)->first();
		$course = Course::where('course_name', $course_name)->where('dep_id', $department->dep_id)->first();
		$course->load('course_announcements');
		return $course;
	}

	public function followAnnouncement($department_name, $course_name, Announcement $announcement)
	{
		$announcement;
		$student = Auth::user()->student;
		$student->followAnnouncement($announcement);
		return redirect()->back();
	}

	public function addProtest(Request $request, $department, Course $course)
	{
		$text = Text::addText($request['protest_body'], 1);
		$text->protest()->save(new Protest)->course_protest()->create(['$course_id'=>$course->course_id]);
		return redirect()->back();
	}
    
}
