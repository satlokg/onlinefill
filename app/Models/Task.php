<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable=[
    	'project_id','user_id','comment','hours'
    ];
}
