<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Potential;
use App\Models\Contact;

class CrmController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.crm.index');
    }
    public function addPotential()
    {
       return view('admin.crm.potential.add');
    }

     public function addPostPotential(Request $r)
    {
    	$req = $r->all();
    	$p = Potential::create($req['potential']);
    	$req['contact']['potential_id']=$p->id;
    	$c = Contact::create($req['contact']);
        if($c){
            $notification = array(
                        'message' => 'Potential Aded', 
                        'alert-type' => 'success'
                    );
        }else{
            $notification = array(
                        'message' => 'Potential not Aded', 
                        'alert-type' => 'danger'
                    );
        }
         return redirect()->route('admin.crm')->with($notification);
    }
}
