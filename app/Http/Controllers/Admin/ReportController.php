<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\User;

class ReportController extends Controller
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
       
        return view('admin.report.index');
    }

    public function report($key)
    {
        $user_id=decrypt($key,'vipra');
        $tasks = Task::orderBy('created_at')
       ->where('user_id',$user_id)
       ->get()->groupBy(function($item) {
            return $item->created_at->format('Y-m-d');
        });
        return view('admin.report.detail',compact('tasks','user_id'));
    }

    public function detail($date,$key)
    {
        $user_id=decrypt($key,'vipra');
        $user_name=User::where('id',$user_id)->first()->name;
       $tasks = Task::orderBy('created_at')
       ->whereDate('created_at',$date)
       ->where('user_id',$user_id)
       ->get();
       //dd($tasks);
        return view('user.report.detail',compact('tasks','user_name'));
    }
}
