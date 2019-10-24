<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
  public function index()
    {
        $users = User::orderBy('name','asc')->get();
        return view('admin.employee.index',compact('users'));
    }

  public function add()
    {
        return view('admin.employee.add');
    }
 public function edit($id)
    {
        $user = User::find($id);
        return view('admin.employee.edit',compact('user'));
    }
  public function register(Request $r)
    {
        if($r->id){
            $user =User::find($r->id);
            $user->name = $r->name;
            $user->email = $r->email;
            $user->phone = $r->phone;
            $user->emp_id =$r->emp_id;
            $user->technology =$r->technology;
            $user->designation =$r->designation;
            if($r->password){
                 $user->password = Hash::make($r->password);
            }
            $user->save();
        }else{
        $user= User::create([
            'name' => $r->name,
            'email' => $r->email,
            'phone' => $r->phone,
            'emp_id' => $r->emp_id,
            'technology' => $r->technology,
            'password' => Hash::make($r->password),
            'designation' => $r->designation,
        ]);
        }
        if($user){
            $notification = array(
                        'message' => 'Employee Aded', 
                        'alert-type' => 'success'
                    );
        }else{
            $notification = array(
                        'message' => 'Employee not Aded', 
                        'alert-type' => 'danger'
                    );
        }
         return back()->with($notification);
    }


    
}
