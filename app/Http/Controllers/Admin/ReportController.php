<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\User;
use App\Models\Project;
use Excel;

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
        $user_name=User::where('id',$user_id)->first()->name;
        $tasks = Task::orderBy('created_at')
       ->where('user_id',$user_id)
       ->get()->groupBy(function($item) {
            return $item->created_at->format('Y-m-d');
        });
        return view('admin.report.detail',compact('tasks','user_id','user_name'));
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
        return view('admin.report.report_detail',compact('tasks','user_name','user_id'));
    }

    public function todayReport(Request $r){ 
        $users= User::all(); 
        $projects= Project::all();
        if($r->date){
            $date=$r->date;
        }else{
            $date=null;
        }
        return view('admin.report.today_report',compact('users','projects','date'));
    }

    public function downloadData($type,$date=null)
    {
        $data=[];
        $users=User::all();
        $projects= Project::all();
        $projects= Project::all();
        if($date){
            $date=$date;
        }else{
            $date=null;
        }

        //
        foreach($projects as $project){
           
                foreach($users as $user){
                    $data['Project/User'][$project->project_name]=$project->project_name;
                    $data['Project/User'][$user->name]=$user->name;
                if($project->AddPlayTime($user->todaySpend($project->id,$user->id,$date)->pluck('hours')) > 0){
                    
                     $data['Project/User'][$user->name]=$project->AddPlayTime($user->todaySpend($project->id,$user->id,$date)->pluck('hours'));
                         
                    }else{
                        $data['Project/User'][$user->name]=' ';
                    }
                    
                   
                }
                
            if($project->AddPlayTime($project->todaySpend($project->id,$date)->pluck('hours')) > 0){
                       $data['Project/User']['Total']=$project->AddPlayTime($project->todaySpend($project->id,$date)->pluck('hours'));
                     }else{
                        $data['Project/User']['Total']=' ';
                     }  
        }

       
                   
        //$data= User::all()->toArray(); 
        

        return Excel::create('excel_data', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
}
