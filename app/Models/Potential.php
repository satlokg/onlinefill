<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Potential extends Model
{
    protected $fillable=[
    	'owner','name','lead_source','phone','website','service','lead_by','shift','discription','amount','demo_host'
    ];
}
