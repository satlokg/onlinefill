<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Auth;
use App\Models\Task;
use Carbon\Carbon;
use DateTime;

class Project extends Model
{
    protected $fillable=[
    	'project_name','technology','delivery_date','git_repo','project_manager','description','start_end','est_hours','status'
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
        return $this->hasMany(Task::class)->orderBy('created_at','DESC');
    }

public function attempts(){
        return $this->hasMany(Attempt::class)->orderBy('id','DESC');
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
        $hours=Task::where('project_id',$pid)->where('user_id',$uid)->pluck('hours');
        $t=new Task();
        return $t->AddPlayTime($hours);
    }
    public function totalspendhour(){
        $pid=$this->id; 
        $hours=Task::where('project_id',$pid)->pluck('hours');
        $t=new Task();
        return $t->AddPlayTime($hours);
    }
    public function todaySpend($pid,$date){ 
         $task = Task::where('project_id',$pid);
        if($date!=null){
            $task->whereDate('created_at',$date);
        }
        $t = $task->get();
        return $t;
    }
    public function AddPlayTime($times) { 
    $minutes = 0; //declare minutes either it gives Notice: Undefined variable
    // loop throught all the times
    foreach ($times as $time) {
      if($time != null){
        list($hour, $minute) = explode(':', $time);
        $minutes += $hour * 60;
        $minutes += $minute;
      }
    }

    $hours = floor($minutes / 60);
    $minutes -= $hours * 60;

    // returns the time already formatted
    return sprintf('%02d:%02d', $hours, $minutes);
}

public function minuts($time) {  
    $minutes = 0; //declare minutes either it gives Notice: Undefined variable
    // loop throught all the times
    //foreach ($times as $time) {
      if($time != null){
        list($hour, $minute) = explode(':', $time);
        $minutes += $hour * 60;
        $minutes += $minute;
      }
    //}

  
    return $minutes;
}


public function todayAttempt($pid,$uid,$date=null){
    $a = new DateTime('00:00:00');
    $b = new DateTime('00:00:00');
    $diff = $a->diff($b);
    $e = new DateTime('00:00:00');
    if($date){
            $ats=Attempt::where('project_id',$pid)->where('user_id',$uid)->whereDate('created_at',$date)->get(['updated_at','created_at']);
            
        }else{
            $ats= Attempt::where('project_id',$pid)->where('user_id',$uid)->whereDate('created_at',Carbon::today())->get(['updated_at','created_at']);
            
        }
    foreach($ats as $at){
        $startTime = Carbon::parse($at->updated_at);
        $diff1 = $at->created_at->diff($startTime);
        $f = clone $e;
        $e->add($diff);
        $e->add($diff1);
        $diff= $f->diff($e);

    }
    return $diff->format("%H:%I:%S");
}

public function totalTodayAttempt($pid,$date=null){
    $a = new DateTime('00:00:00');
    $b = new DateTime('00:00:00');
    $diff = $a->diff($b);
    $e = new DateTime('00:00:00');
    if($date){
            $ats=Attempt::where('project_id',$pid)->whereDate('created_at',$date)->get(['updated_at','created_at']);
            
        }else{
            $ats= Attempt::where('project_id',$pid)->whereDate('created_at',Carbon::today())->get(['updated_at','created_at']);
            
        }
    foreach($ats as $at){
        $startTime = Carbon::parse($at->updated_at);
        $diff1 = $at->created_at->diff($startTime);
        $f = clone $e;
        $e->add($diff);
        $e->add($diff1);
        $diff= $f->diff($e);

    }
    return $diff->format("%H:%I:%S");
}

public function todayRunning($pid,$uid,$date=null){
   
    if($date){
            $ats=Attempt::select('status')->where('project_id',$pid)->where('user_id',$uid)->where('status',1)->whereDate('created_at',$date)->first();
            
        }else{
            $ats= Attempt::select('status')->where('project_id',$pid)->where('user_id',$uid)->where('status',1)->whereDate('created_at',Carbon::today())->first();
            
        }
    if($ats){
        return $ats->status;
    }else{
        return 0;
    }
}
}
