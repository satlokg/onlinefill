<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\ItemNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use App\User;
use App\Models\Project;
use App\Models\Task;
use App\Models\Taskdac;
use App\Models\File;
use App\Models\Attempt;
use Auth;
use Carbon\Carbon;

class ProjectController extends Controller
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
        $projects=Auth::user()->projecthours; //dd($projects);
        return view('home',compact('projects'));
    }
    public function projectLead()
    {
        $projects=Project::where('project_manager',Auth::user()->id)->get(); 
        return view('user.project.project-lead',compact('projects'));
    }

    public function projectLeadDetail($key)
    {
        $id=decrypt($key,'vipra'); 
        $project=Project::find($id); 
        return view('user.project.leaddetail',compact('project'));
    }

    public function addHours(Request $r){
    	$sum=0;
    	$project =Project::find($r->project_id);
          if(is_array($r->hours)){ 
            foreach ($r->hours as $key => $value) {
                if(isset($value['alloted_hours'])){
                    $sum=$sum+$value['alloted_hours'];
                }else{
                    $ph=ProjectHour::where('user_id',$value['user_id'])
                    ->where('project_id',$project->id)
                    ->first();
                    $sum=$sum+$ph->alloted_hours;
                }
                
            }
            if($sum > $project->est_hours){
                $notification = array(
                        'message' => 'Your Hours is increase from total estimeted hours', 
                        'alert-type' => 'warning'
                    );
                return back()->with($notification);
            }
            foreach ($r->hours as $key => $value) {
                if(isset($value['alloted_hours'])){
                $project->userhours()->updateExistingPivot($value['user_id'], array('alloted_hours' => $value['alloted_hours']), false);
            }
            }
         }

            $notification = array(
                        'message' => 'Hours added', 
                        'alert-type' => 'success'
                    );
         return back()->with($notification);
    }

    public function start()
    {
        // $id=decrypt($key,'vipra'); 
        // $at=$attempt= Attempt::where('user_id',Auth::user()->id)->where('status',1)->whereDate('created_at',Carbon::today())->first();
        // if($at){
        //     $notification = array(
        //                 'message' => 'Already started Project'.$at->project->project_name, 
        //                 'alert-type' => 'error'
        //             ); 
        //  return back()->with($notification);
        // }
        $attempt=new Attempt(); 
        $attempt->user_id=Auth::user()->id;
        //$attempt->project_id=$id;
        $attempt->status=1;
        $attempt->save();

        $notification = array(
                        'message' => 'Project Started', 
                        'alert-type' => 'success'
                    );
         return back()->with($notification);
    }

    public function stop($ids)
    {
       // $id=decrypt($key,'vipra'); 
        $attempt= Attempt::find($ids); 
        $attempt->user_id=Auth::user()->id;
        //$attempt->project_id=$id;
        $attempt->status=0;
        $attempt->save();
        $notification = array(
                        'message' => 'Project Stop', 
                        'alert-type' => 'error'
                    );
         return back()->with($notification);
    }

}
