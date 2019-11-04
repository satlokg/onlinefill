<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Task;
use Carbon\Carbon;

class ReportController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

       $tasks = Task::orderBy('created_at')
       ->where('user_id',Auth::user()->id)
       ->get()->groupBy(function($item) {
            return $item->created_at->format('Y-m-d');
        });

       // ->whereYear('created_at', Carbon::now()->year)
       // ->whereMonth('created_at', Carbon::now()->month)
       // dd($tasks);
        return view('user.report.index',compact('tasks'));
    }

     public function detail($date)
    {

       $tasks = Task::orderBy('created_at')
       ->whereDate('created_at',$date)
       ->where('user_id',Auth::user()->id)
       ->get();
       //dd($tasks);
        return view('user.report.detail',compact('tasks'));
    }
}
