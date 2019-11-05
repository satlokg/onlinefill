<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Auth;
class Task extends Model
{
    protected $fillable=[
    	'project_id','user_id','comment','hours'
    ];
    public function taskdocs(){
    	return $this->hasMany(Taskdac::class);
    }
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function project(){

    	return $this->belongsTo(Project::class);
    }

    static function task($d){

        $task = Task::orderBy('created_at')
       ->whereDate('created_at', $d)
       ->get();
       return $task;


       // $task = Task::orderBy('created_at')
       // ->whereDate('created_at', Carbon::now()->year)
       // ->whereMonth('created_at', Carbon::now()->month)
       // ->get()->groupBy(function($item) {
       //      return $item->created_at->format('Y-m-d');

       //  });
       // return $task;
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
}
