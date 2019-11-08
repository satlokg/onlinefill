<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\User;
use App\Models\Project;
use Excel;
use Carbon\Carbon;

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
        if($r->date){
            $pid=Task::groupBy('project_id')->whereDate('created_at',$r->date)->whereNotNull('hours')->pluck('project_id');
            $projects= Project::whereIn('id',$pid)->get();
            $date=$r->date;
        }else{
            $projects= Project::all();
            $date=null;
        }
        return view('admin.report.today_report',compact('users','projects','date'));
    }

    public function downloadData($type,$date=null)
    {
        $data=[];
        $users=User::all();
       
        if($date){
             $pid=Task::groupBy('project_id')->whereDate('created_at',$r->date)->whereNotNull('hours')->pluck('project_id');
            $projects= Project::whereIn('id',$pid)->get();
            $date=$date;
        }else{
            $projects= Project::all();
            $date=null;
        }

        //
        foreach($projects as $project){
           
                foreach($users as $user){
                    $data[$project->project_name][$project->project_name]=$project->project_name;
                    $data[$project->project_name][$user->name]=$user->name;
                   
                if($project->minuts($project->AddPlayTime($user->todaySpend($project->id,$user->id,$date)->pluck('hours'))) > 0){
                    
                     $data[$project->project_name][$user->name]=$project->AddPlayTime($user->todaySpend($project->id,$user->id,$date)->pluck('hours'));
                         
                    }else{
                        $data[$project->project_name][$user->name]=' ';
                    }
                    
                   
                }
                
               if($project->minuts($project->AddPlayTime($project->todaySpend($project->id,$date)->pluck('hours'))) > 0){
                       $data[$project->project_name]['Total']=$project->AddPlayTime($project->todaySpend($project->id,$date)->pluck('hours'));
                     }else{
                        $data[$project->project_name]['Total']=' ';
                     }  

        }

       
                   
        //$data= User::all()->toArray(); 
        

        return Excel::create('work-report('. $date.')', function($excel) use ($data) {
            $excel->sheet('work-report( $date)', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
}
