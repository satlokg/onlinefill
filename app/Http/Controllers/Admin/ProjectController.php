<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\File;
use App\User;
use App\Models\ProjectHour;
class ProjectController extends Controller
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
        $projects = Project::orderBy('created_at','desc')->get();
        return view('admin.project.index',compact('projects'));
    }

    public function add()
    {
        $users=User::all();
        return view('admin.project.add',compact('users'));
    }
 public function edit($id)
    {
        $project = Project::find($id);
        $users=User::all();
        return view('admin.project.edit',compact('project','users'));
    }
  public function projectPost(Request $r)
    { 
         
        $this->validate($r, [
                'filenames.*' => 'mimes:doc,pdf,docx,zip,png,jpg,xlsx,xls'
        ]);
        if($r->id){
            $project =Project::find($r->id);
            $project->project_name = $r->project_name;
            $project->technology = $r->technology;
            $project->delivery_date = $r->delivery_date;
            $project->git_repo =$r->git_repo;
            $project->project_manager =$r->project_manager;
            $project->description =$r->description;
            $project->start_end =$r->start_end;
            $project->est_hours =$r->est_hours;
            $project->status =$r->status;
            $project->save();
           
        }else{
        $project= Project::create([
            'project_name' => $r->project_name,
            'technology' => $r->technology,
            'delivery_date' => $r->delivery_date,
            'git_repo' => $r->git_repo,
            'project_manager' => $r->project_manager,
            'description' =>$r->description,
            'start_end' =>$r->start_end,
            'est_hours' =>$r->est_hours,
            'status' =>$r->status,
        ]);
         $project->users()->sync($r->assign_user);
         $project->userhours()->sync($r->assign_user);
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
                $f= new File();
                 $f->filename=$imageName;
                 $f->project_id=$project->id;
                 $f->save(); 
            }
         }
         $sum=0;
          if(is_array($r->hours)){ 
            foreach ($r->hours as $key => $value) {
                if(isset($value['alloted_hours'])){
                    $sum=$sum+$this->minuts($value['alloted_hours']);
                }else{
                    $ph=ProjectHour::where('user_id',$value['user_id'])
                    ->where('project_id',$project->id)
                    ->first();
                    $sum=$sum+$this->minuts($ph->alloted_hours);
                }
                
            }
            if($sum > $this->minuts($project->est_hours)){
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
         
        if($project){
            $notification = array(
                        'message' => 'Project Aded', 
                        'alert-type' => 'success'
                    );
        }else{
            $notification = array(
                        'message' => 'Project not Aded', 
                        'alert-type' => 'danger'
                    );
        }
         return back()->with($notification);
    }
 public function deleteUser($id,$pid)
    {
        $project = Project::find($pid);
        $ph=ProjectHour::where('user_id',$id)->where('project_id',$pid)->whereNull('alloted_hours')->first();
        if($ph){
            $ph->delete();
        }
        $project->users()->detach([$id]);
         $notification = array(
                        'message' => 'user removed', 
                        'alert-type' => 'success'
                    );
        return back()->with($notification);
    }
   public function deleteFile($id)
    {
        $file = File::find($id);
        $filepath=public_path('files/'.$file->filename);
        //dd($filepath);
        if(file_exists('filepath')){
        unlink($filepath);
            }
        if($file->delete()){
         $notification = array(
                        'message' => 'file removed', 
                        'alert-type' => 'success'
                    );
        }
        return back()->with($notification);
    }

public function addUser(Request $r)
    {
       $project=Project::find($r->project_id);
       $project->users()->attach($r->assign_user);
       foreach ($r->assign_user as $key => $value) {
        $ph=ProjectHour::where('user_id',$value)
                    ->where('project_id',$r->project_id)
                    ->first();
        if($ph==null){
            ProjectHour::create([
            'user_id'=>$value,
            'project_id'=>$r->project_id
          ]);
        }
          
       }
         $notification = array(
                        'message' => 'User Added', 
                        'alert-type' => 'success'
                    );
        return back()->with($notification);
    }

    public function projectDetail($key)
    {
        $id=decrypt($key,'vipra');
        $project=Project::find($id); 
        return view('admin.project.detail',compact('project'));
    }

    public function delete($key)
    {
        $id=decrypt($key,'vipra');
        $project=Project::find($id)->delete(); 
        $notification = array(
                        'message' => 'Project Deleted', 
                        'alert-type' => 'success'
                    );
        return back()->with($notification);
    }

}
