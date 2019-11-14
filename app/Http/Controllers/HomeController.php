<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $at=Attempt::where('user_id',Auth::user()->id)->orderBy('id','DESC')->first();
        return view('home',compact('projects','at'));
    }
    public function projectDetail($key,$cid=null)
    {
        $id=decrypt($key,'vipra');
        $project=Project::find($id); 
        if($cid != null){
            $cid=decrypt($cid,'vipra'); 
            $taske=Task::find($cid);
        }else{
            $taske='';
        }
        
        return view('user.project.detail',compact('project','taske'));
    }
    public function projectComment(Request $r)
    {
        $this->validate($r, [
                'filenames.*' => 'mimes:doc,pdf,docx,zip,png,jpg,xlsx,xls',
                'task.comment'=>'required'
        ]);
        $t=$r->task;
        $t['user_id']=Auth::user()->id;
        if($r->task['id']){
            $task=Task::find($r->task['id']);
            $task->comment=$r->task['comment'];
            $task->hours=$r->task['hours'];
            $task->save();
        }else{
            $task=Task::create($t);
        }
        
        if($r->hasfile('filenames'))
         {
            foreach($r->file('filenames') as $file)
            {
                // $name=$file->getClientOriginalName();
                // $file->move(public_path().'/files/', $name);
              $destinationPath = public_path('files'); 
              $filepath =$destinationPath.'/'. File::sanitize($file->getClientOriginalName());
              $fileinfo = pathinfo(File::generateFilename($filepath));
              $imageName= $fileinfo['basename'];
              $file->move($destinationPath,$imageName);
                $f= new Taskdac();
                 $f->filename=$imageName;
                 $f->task_id=$task->id;
                 $f->save(); 
            }
         }
         if($task){
            $notification = array(
                        'message' => 'Comment Aded', 
                        'alert-type' => 'success'
                    );
        }else{
            $notification = array(
                        'message' => 'Comment not Aded', 
                        'alert-type' => 'danger'
                    );
        }
         return redirect()->route('user.projects.detail',['id'=>encrypt($r->task['project_id'],'vipra')])->with($notification);
    }

    public function notify(){
         $user= User::all();
         $data=collect([
            'title' => "this is tilte of notification",
            'body' => "this is body of notification"
            ]);
            Notification::send($user, new ItemNotification($data));
            return view('home');
    }
}
