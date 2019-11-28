<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
       dd($r->all());
    }
}
