<?php
use App\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use App\User;


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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('markasread', function () {
   \Auth::user()->notifications->markAsRead();
   return redirect()->back();
})->name('markAsRead');
Route::get('markasunread', function () {
   \Auth::user()->notifications->markAsUnRead();
});




Auth::routes();
Route::post('/login', [
    'uses'          => 'Auth\LoginController@login',
    'middleware'    => 'checkstatus',
]);
//chat
Route::get('/', 'HomeController@index')->name('home');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');
//chat

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/project-detail/{key}/{cid?}', 'HomeController@projectDetail')->name('user.projects.detail');
Route::post('/project-comment', 'HomeController@projectComment')->name('user.projects.comment');

//user-project
Route::get('/project-lead', 'user\ProjectController@projectLead')->name('user.project.lead');
Route::get('/project-lead-detail/{key}', 'user\ProjectController@projectLeadDetail')->name('user.projects.leaddetail');
Route::post('/project-lead-hours', 'user\ProjectController@addHours')->name('user.projects.addHours');
Route::get('/project-start/{key}', 'user\ProjectController@start')->name('user.project.start');
Route::get('/project-stop/{key}', 'user\ProjectController@stop')->name('user.project.stop');




//report
Route::get('/report', 'user\ReportController@index')->name('user.report');
Route::get('/report/detail/{date}', 'user\ReportController@detail')->name('user.report.detail');


Route::get('/notify', 'HomeController@notify')->name('notify');

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/home', 'Admin\AdminController@index')->name('admin.home');
    Route::get('/dashboard', 'Admin\AdminController@dashboard')->name('admin.dashboard');

    //user
    Route::get('/employee/list', 'Admin\EmployeeController@index')->name('admin.employee');
    Route::get('/employee/add', 'Admin\EmployeeController@add')->name('admin.employee.add');
    Route::post('/employee/register', 'Admin\EmployeeController@register')->name('admin.employee.register');
    Route::get('/employee/edit/{id}', 'Admin\EmployeeController@edit')->name('admin.employee.edit');
    Route::get('/employee/delete/{id}', 'Admin\EmployeeController@delete')->name('admin.employee.delete');
    //project
    Route::get('/projects/list', 'Admin\ProjectController@index')->name('admin.projects');
    Route::get('/projects/add', 'Admin\ProjectController@add')->name('admin.projects.add');
    Route::post('/projects/projectPost', 'Admin\ProjectController@projectPost')->name('admin.projects.projectPost');
    Route::get('/projects/edit/{id}', 'Admin\ProjectController@edit')->name('admin.projects.edit');
    Route::get('/projects/delete/user/{id}/{pid}', 'Admin\ProjectController@deleteUser')->name('admin.project.delete.user');
    Route::get('/projects/delete/file/{id}', 'Admin\ProjectController@deleteFile')->name('admin.project.delete.file');
    Route::post('/add/user', 'Admin\ProjectController@addUser')->name('admin.add.user');

    Route::get('/project-detail/{key}', 'Admin\ProjectController@projectDetail')->name('admin.projects.detail');
    Route::get('/project-delete/{key}', 'Admin\ProjectController@delete')->name('admin.projects.delete');
    //report
    Route::get('/report/list', 'Admin\ReportController@index')->name('admin.report');
    Route::get('/report/user/{key}', 'Admin\ReportController@report')->name('admin.user.report');
    Route::get('/report/detail/{date}/{key}', 'Admin\ReportController@detail')->name('admin.user.report.detail');
    Route::get('/report/todayReport', 'Admin\ReportController@todayReport')->name('admin.report.todayReport');
    Route::get('/report/downloadData/{type}/{date?}', 'Admin\ReportController@downloadData')->name('admin.report.download');

    //attempt
    Route::get('/report/attempt', 'Admin\ReportController@attempt')->name('admin.report.attempt');


    //CRM admin.crm.potential.addPost
    Route::get('/crm', 'Admin\CrmController@index')->name('admin.crm');
    Route::get('/crm/potential/add', 'Admin\CrmController@addPotential')->name('admin.crm.potential.add');
    Route::post('/crm/potential/addPost', 'Admin\CrmController@addPostPotential')->name('admin.crm.potential.addPost');

});

Route::prefix('vendor')->group(function() {
    Route::get('/login', 'Auth\VendorLoginController@showLoginForm')->name('vendor.login');
    Route::post('/login', 'Auth\VendorLoginController@login')->name('vendor.login.submit');
    Route::get('/home', 'Vendor\VendorController@index')->name('vendor.home');
    Route::get('/dashboard', 'Vendor\VendorController@dashboard')->name('vendor.dashboard');
    Route::get('/profile', 'Vendor\VendorController@profile')->name('vendor.profile');
});
