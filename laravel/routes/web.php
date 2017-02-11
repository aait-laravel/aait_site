<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/index', function(){
	$active_side = 'posts';
	return view('index', compact('active_side'));
});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();





//public routes
Route::group(['middleware'=>'web'], function(){
	Route::get('public/posts', [
		'uses' => 'PublicController@getPosts',
		'as' => 'posts'
	]);
	Route::post('public/storepost', [
		'uses' => 'PublicController@addPost',
		'as' => 'post.store',
		'middleware' => 'auth'
		]);
	Route::get('public/all', [
		'uses' => 'PublicController@home']);

	//Route::get('public/protests', 'PublicController@getProtests');
	Route::get('public/news', 'PublicController@getNews');
	Route::get('public/announcements', 'PublicController@getAnnouncements');
	Route::get('public/discussion', 'PublicController@getDiscussion');
});

Route::group(['middleware' =>'web'], function(){
	Route::post('/public/post', 'PublicController@addPost');
	Route::post('/public/{post}/delete_post', 'PublicController@deletePost');
	Route::post('public/message', 'PublicController@addPublicMessage');
	Route::post('public/{message}/delete_message', 'PublicController@deletePublicMessage');
});

Route::get('/home', 'HomeController@index');

Route::group(['middleware'=>'auth'], function(){
	Route::get('/profile', 'HomeController@getProfile');
	Route::get('/profile/{user}', 'HomeController@getUserProfile');
	Route::get('profile/update_profile_form', 'HomeController@editProfileForm');
	Route::post('profile/update_profile', 'HomeController@editProfile');
	Route::post('profile/change_avatar', 'HomeController@changeAvatar');
	Route::get('/groups', 'MessageController@getGroups');
	Route::post('/groups/create_group', 'StudentController@createGroup');
	Route::get('mailing', 'MessageController@getMailing');
	Route::post('mailing/send', 'StudentController@sendMail');

	Route::post('/send_chat_message', 'StudentController@sendChatMessage');
	Route::get('/{user}/get_chat_message', 'StudentController@getChatMessage');
	Route::get('/test', 'StudentController@test');
});
//department routes

Route::group(['middleware'=>'auth'], function(){
	Route::get('department/departments', 'DepartmentController@getDepartments');
	Route::get('department/{department_name}/home', 'DepartmentController@departmentHome');
	Route::post('department/storedepartment', 'DepartmentController@addDepartment');
	Route::post('department/deletedepartment', 'DepartmentController@deleteDepartment');
	Route::get('department/editdepartment', 'DepartmentController@editDepartmentForm');
	Route::Post('department/editdepartment', 'DepartmentController@editDepartment');

	Route::get('department/posts', 'DepartmentController@getStudPosts');
	Route::get('department/announcements', 'DepartmentController@getStudAnnouncements');
	Route::get('department/questions', 'DepartmentController@getStudQuestions');
	Route::get('department/protests', 'DepartmentController@getStudeProtests');
	Route::get('department/discussion', 'DepartmentController@getStudDiscussions');

	Route::post('department/{department}/storecourse', 'DepartmentController@addCourse');

	Route::get('department/{department_name}/posts', 'DepartmentController@getPosts');
	Route::post('department/{department_name}/post', 'DepartmentController@addPost');
	Route::post('department/{department_name}/{text}/delete_post', 'DepartmentController@deletePost');

	Route::get('department/{department_name}/discussion', 'DepartmentController@getDiscussion');
	Route::post('department/{department_name}/message', 'DepartmentController@addPublicMessage');
	Route::post('department/{department_name}/{message}/delete_message', 'DepartmentController@deletePublicMessage');

	Route::get('department/{department_name}/questions', 'DepartmentController@getQuestions');
	Route::post('department/{department_name}/ask', 'DepartmentController@addQuestion');
	Route::post('department/{department_name}/{question}/delete', 'DepartmentController@deleteQeustion');
	Route::post('department/{department_name}/{question}/answer', 'DepartmentController@answerQuestion');
	Route::get('department/{department_name}/{question}/{answer}/approve', 'DepartmentController@approveAnswer');
	Route::post('department/{department_name}/{question}/{answer}/delete', 'DepartmentController@deleteQuestion');

	Route::get('department/{department_name}/protests', 'DepartmentController@getProtests');
	Route::get('department/{department_name}/request_protest', 'DepartmentController@requestProtest');

	Route::get('department/{department_name}/announcements', 'DepartmentController@getAnnouncements');
	Route::post('department/{department_name}/announce', 'AnnouncementController@announce');
	Route::post('department/{department_name}/{announcement}/follow', 'DepartmentController@followAnnouncement');
	Route::get('department/{department_name}/news', 'DepartmentController@getNews');
});

/*** course routes ***/
Route::group(['middleware'=>'auth'], function(){
	Route::get('courses', 'CourseController@getCourses');
	Route::get('department/{department_name}/courses', 'CourseController@getDepartmentCourses');
	Route::get('department/{department_name}/{course_name}/home', 'CourseController@courseHome');
	Route::get('department/{department_name}/{course_name}/edit', 'CourseController@editCourseForm');
	Route::post('department/{department_name}/{course_name}/edit', 'CourseController@editCourse');

	Route::get('course/courses/discussion', 'CourseController@getStudCourses');
	Route::get('course/courses/posts', 'CourseController@getStudPosts');
	Route::get('course/courses/questions', 'CourseController@getStudQuestions');

	Route::get('department/{department_name}/{course_name}/posts', 'CourseController@getPosts');
	Route::post('department/{department_name}/{course_name}/post', 'CourseController@addPost');
	Route::post('department/{department_name}/{course_name}/{text}/delete_post', 'CourseController@deletePost');

	Route::get('department/{department_name}/{course_name}/discussion', 'CourseController@getDiscussion');
	Route::post('department/{department_name}/{course_name}/message', 'CourseController@addPublicMessage');
	Route::post('department/{department_name}/{course_name}/{message}/delete_message', 'CourseController@deletePublicMessage');

	Route::get('department/{department_name}/{course_name}/questions', 'CourseController@getQuestions');
	Route::post('department/{department_name}/{course_name}/ask', 'CourseController@addQuestion');
	Route::post('department/{department_name}/{course_name}/{question}/delete', 'CourseController@deleteQuestion');
	Route::post('department/{department_name}/{course_name}/{question}/answer', 'CourseController@answerQuestion');
	Route::post('department/{department_name}/{course_name}/{question}/{answer}/delete', 'CourseController@deleteAnswer');

	Route::get('department/{department_name}/{course_name}/protests', 'CourseController@getProtests');
	Route::post('department/{department_name}/{course_name}/request_protest', 'CourseController@requestProtest');

	Route::get('department/{department_name}/{course_name}/announcements', 'CourseController@getAnnouncements');
	Route::post('department/{department_name}/{course_name}/{announcement}/follow', 'CourseController@followAnnouncement');
});


/****section routes ***/



// old dep
// Route::group(['middleware'=>'web'], function(){
// 	Route::get('department/departments', 'DepartmentController@getDepartments');
// 	Route::post('department/storedepartment', 'DepartmentController@addDepartment')->name('add_dep');
// 	Route::get('department/{department}', 'DepartmentController@getDepartment');

// 	Route::get('department/{department}/announcement', 'DepartmentController@getAnnoucnements');

// 	Route::get('department/{department}/news', 'DepartmentController@getNews');

// //done
// 	Route::get('department/{department}/posts', 'DepartmentController@getPosts');
// 	Route::post('department/{department}/post', 'DepartmentController@addPost');
// 	Route::get('department/{department}/{text}/delete', 'DepartmentController@deletePost');

// //done
// 	Route::get('department/{department}/discussion', 'DepartmentController@getDiscussion');
// 	Route::post('department/{department}/message', 'DepartmentController@addPublicMessage');
// 	Route::post('department/{department}/{message}/delete', 'DepartmentController@deletePublicMessage');

// 	Route::get('department/{department}/Events', 'DepartmentController@getEvents');
// 	Route::get('department/{department}/protest', 'DepartmentController@getProtests');

// 	Route::get('department/{department}/questions', 'DepartmentController@getQuestions');
// 	Route::post('department/{department}/ask', 'DepartmentController@addQuestion');
// });
/*** channel ***/
Route::group(['middleware'=>'auth'], function(){
	Route::get('channel/channels', 'ChannelController@getChannels');
	Route::post('channel/add_channel', 'ChannelController@addChannel');
	Route::get('channel/{channel_name}', 'ChannelController@channelHome');
	Route::post('channel/{channel_name}/delete', 'ChannelController@deleteChannel');
	Route::get('channel/{channel_name}/edit', 'ChannelController@editChannelForm');
	Route::post('channel/{channel_name}/edit', 'ChannelController@editChannel');

	Route::get('channel/{channel_name}/blogs', 'ChannelController@getBlogs');
	Route::post('channel/{channel_name}/addBlog', 'ChannelController@addBlog');
	Route::post('channel/{channel_name}/{blog}/delete', 'ChannelController@deleteBlog');

	Route::get('channel/{channel_name}/discussion', 'ChannelController@getDiscussion');
	Route::post('channel/{channel_name}/message', 'ChannelController@addPublicMessage');
	Route::post('channel/{channel_name}/{message}/delete', 'ChannelController@deletePublicMessage');

	Route::get('channel/{channel_name}/bloggers', 'ChannelController@getBloggers');
	Route::post('channel/{channel_name}/addblogger', 'ChannelController@addBlogger');
	Route::post('channel/{channel_name}/{blogger}/delete', 'ChannelController@deleteBlogger');

});


/*** Text controll ****/

Route::group(['middleware'=>'auth'], function(){
	Route::post('text/{text}/edit', 'TextController@editText');
	Route::post('text/{text}/comment', 'TextController@commentText');
	Route::get('text/{text}/like', 'TextController@likeText');
	Route::get('text/{text}/dislike', 'TextController@dislikeText');
	Route::get('text/{text}/follow', 'TextController@followText');
	Route::get('text/{text}/unfollow', 'TextController@unfollowText');
});


//  old channel
//Channel routes
// Route::group(['middleware'=>'web'], function(){
// 	Route::get('channel/channels', 'ChannelController@getChannels');
// 	Route::get('channel/{channel}', 'ChannelController@home');
// 	Route::get('channel/{channel}/posts', 'ChannelController@getPosts');
// 	Route::post('channel/{channel}/post', 'ChannelController@addPost');
// 	Route::get('channel/{channel}/discussion', 'ChannelController@getDiscussion');
// 	Route::get('channel/{channel}/questions', 'ChannelController@getQuestions');
// });

// Route::group(['middleware'=>'web'], function(){
// 	Route::get('user/{user_id}', 'UserController@home');
// 	Route::get('user/{user_id}/profile', 'UserController@profile');
// 	Route::get('user/{user_id}/mail', 'UserController@getMail');
// 	Route::get('user/{user_id}/group_discussion', 'UserController@getGroupDescuss');
// });

//old course
//Course routes
// Route::group(['middleware'=>'web'], function(){
// 	Route::get('department/{department}/{course}', 'CourseController@getCourse');
// 	Route::get('department/{department}/courses', 'CourseController@getCourses');

// 	Route::get('department/{department}/{course}/questions', 'CourseController@getQuestions');
// 	Route::post('department/{department}/{course}/ask', 'CourseController@addQuestion');
	

// 	Route::get('department/{department}/{course}/{course_name}/posts', 'CourseController@getPosts');
// 	Route::post('department/{department}/{course}/post', 'CourseController@addPost');

// 	Route::get('department/{department}/{course_name}/annoucnement', 'CourseController@getAnnouncements');
// 	Route::post('department/{department}/{course_name}/announce', 'CourseController@addAnnouncement');
	
// 	Route::get('department/{department}/{course}/protests', 'CourseController@getProtests');
// 	Route::post('department/{department}/{course}/add_protest', "CourseContrller@addProtest");

// 	Route::get('department/{department}/{course}/discussion', 'CourseController@getDiscussion');
// 	Route::post('department/{department}/{course}/add_message', 'CourseController@addPublicMessage');
	
// });

// Route::group(['middleware'=>'web'], function(){
// 	Route::get('home/blogs', 'BlogController@getTopBlogs');
// 	Route::get('home/bloggers', 'BlogController@getBloggers');
// 	Route::get('home/blogs/{blogger_id}', 'BlogController@profile');
// 	Route::get('home/blogs/{blogger_id}/blogs', 'BlogController@blogs');
// });