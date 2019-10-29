<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
