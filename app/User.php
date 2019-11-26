<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Task;
use App\Models\Attempt;
use Carbon\Carbon;
use DateTime;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','emp_id','technology','phone','designation'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function projects(){
        return $this->belongsToMany('App\Models\Project','project_user')
        ->withPivot('alloted_hours')->withTimestamps();
    }

    public function projecthours(){
        return $this->belongsToMany('App\Models\Project','project_hour')
        ->withPivot('alloted_hours','spend_hours')->withTimestamps();
    }
    public function task(){
        return $this->hasOne('App\Models\Task');
    }
    public function tasks(){
        return $this->hasMany('App\Models\Task');
    }
    public function todaySpend($pid,$uid,$date){
        $task = Task::where('project_id',$pid)->where('user_id',$uid);
        if($date!=null){
            $task->whereDate('created_at',$date);
        }
        $task->get();
        return $task;
    }

    public function allTodaySpend($uid,$date){ 
         $task = Task::where('user_id',$uid);
        if($date!=null){
            $task->whereDate('created_at',$date);
        }
        $t = $task->get();
        return $t;
    }
    public function messages()
        {
          return $this->hasMany(Message::class);
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

public function totalTodayAttempt($uid,$date=null){
   $a = new DateTime('00:00:00');
    $b = new DateTime('00:00:00');
    $diff = $a->diff($b);
    $e = new DateTime('00:00:00');
    if($date){
            $ats=Attempt::where('user_id',$uid)->whereDate('created_at',$date)->get(['updated_at','created_at']);
            
        }else{
            $ats= Attempt::where('user_id',$uid)->whereDate('created_at',Carbon::today())->get(['updated_at','created_at']);
            
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
}
