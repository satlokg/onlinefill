<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Auth;
use App\Models\Task;
class Project extends Model
{
    protected $fillable=[
    	'project_name','technology','delivery_date','git_repo','project_manager','description','start_end','est_hours'
    ];
    public function projectManager($id){
        $user=User::find($id);
        return $user->name.' '.'('.$user->designation.')';
    }
    public function files(){
    	return $this->hasMany(File::class);
    }

    public function users(){
        return $this->belongsToMany('App\User','project_user')
        ->withPivot('alloted_hours');
    }
    public function userhours(){
        return $this->belongsToMany('App\User','project_hour')
        ->withPivot('alloted_hours','spend_hours')->withTimestamps();
    }


    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function projecthour($uid=null){
        if($uid==null){
            $uid=Auth::user()->id;
        }
        $pid=$this->id; 
        $hour=ProjectHour::where('project_id',$pid)->where('user_id',$uid)->first();
        return $hour;
    }
    public function spendhour($uid=null){
        if($uid==null){
            $uid=Auth::user()->id;
        }
        $pid=$this->id; 
        $hour=Task::where('project_id',$pid)->where('user_id',$uid)->sum('hours');
        return $hour;
    }
    public function totalspendhour(){
        $pid=$this->id; 
        $hour=Task::where('project_id',$pid)->sum('hours');
        return $hour;
    }
    public function todaySpend($pid,$date){ 
         $task = Task::where('project_id',$pid);
        if($date!=null){
            $task->whereDate('created_at',$date);
        }
        $t = $task->get();
        return $t;
    }
}
