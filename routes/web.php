<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//use Notification;
//use App\Notifications\MailNotification;
/*Route::get('/', function () {


    return view('welcome');

});*/
Route::get('/',function(){
	return view('auth.login');
});


Route::get('project',
	 'projectController@show'
	);

Route::post('create','projectController@store');

Route::get('profile','userController@show');


Route::get('chat',['as'=>'chat','uses'=>'PageCont@chat']);

Route::get('task','TasksController@show');


Route::get('shatha', 'Controller@freichatx_get_hash');
Route::get('calendar','HomeController@show');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('post','PostNot');
Route::post('AcceptedTask','TasksController@markasaccepted');
Route::post('DeclinedTask','TasksController@markasDeclined');
Route::post('task/store','TasksController@store');
Route::post('task/delete','TasksController@delete');
Route::get('MarkAllSeen','PostNot@seen');




// Route::get('register',[
// 	'uses' => 'Auth\RegisterController@register',
// 	'as' => 'register',
// 	'middleware' => 'roles',
// 	'roles' => ['scrum master'],
// 	]);

Route::get('/admin', [
        'uses' => 'AdminController@getAdminPage',
        'as' => 'admin',
        'middleware' => 'roles',
        'roles' => ['scrum master']
    ]);


Route::post('/admin/assign', [
        'uses' => 'AdminController@AssignRoles',
        'as' => 'admin/assign',
        'middleware' => 'roles',
        'roles' => ['scrum master']
    ]);

Route::get('/showRegisterForm', [
        'uses' => 'AdminController@show',
        'as' => 'showRegisterForm',
        'middleware' => 'roles',
        'roles' => ['scrum master']
    ]);

Route::post('/createUser', [
        'uses' => 'AdminController@createUser',
        'as' => 'createUser',
        'middleware' => 'roles',
        'roles' => ['scrum master']
    ]);


