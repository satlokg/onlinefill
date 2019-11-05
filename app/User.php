<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Task;

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
    public function messages()
        {
          return $this->hasMany(Message::class);
        }
}
