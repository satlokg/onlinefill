<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectHour extends Model
{
    protected $table='project_hour';
    protected $fillable=[
    	'project_id','user_id','alloted_hours','spend_hours'
    ];

}
