<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

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
}
