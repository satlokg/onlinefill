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

Route::get('/', function () {
    return view('welcome');
});



Route::get('markasread', function () {
   \Auth::user()->notifications->markAsRead();
   return redirect()->back();
})->name('markAsRead');
Route::get('markasunread', function () {
   \Auth::user()->notifications->markAsUnRead();
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
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
    //project
    Route::get('/projects/list', 'Admin\ProjectController@index')->name('admin.projects');
    Route::get('/projects/add', 'Admin\ProjectController@add')->name('admin.projects.add');
    Route::post('/projects/projectPost', 'Admin\ProjectController@projectPost')->name('admin.projects.projectPost');
    Route::get('/projects/edit/{id}', 'Admin\ProjectController@edit')->name('admin.projects.edit');
    Route::get('/projects/delete/user/{id}/{pid}', 'Admin\ProjectController@deleteUser')->name('admin.project.delete.user');
    Route::get('/projects/delete/file/{id}', 'Admin\ProjectController@deleteFile')->name('admin.project.delete.file');
    Route::post('/add/user', 'Admin\ProjectController@addUser')->name('admin.add.user');
    //report
    Route::get('/report/list', 'Admin\ReportController@index')->name('admin.report');
    
});

Route::prefix('vendor')->group(function() {
    Route::get('/login', 'Auth\VendorLoginController@showLoginForm')->name('vendor.login');
    Route::post('/login', 'Auth\VendorLoginController@login')->name('vendor.login.submit');
    Route::get('/home', 'Vendor\VendorController@index')->name('vendor.home');
    Route::get('/dashboard', 'Vendor\VendorController@dashboard')->name('vendor.dashboard');
    Route::get('/profile', 'Vendor\VendorController@profile')->name('vendor.profile');
});
