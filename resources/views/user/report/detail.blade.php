@extends('layouts.user')
@section('css')
<link rel="stylesheet" href="{{asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

 @endsection
 @section('bread')
 <section class="content-header">
      <h1>
        Project
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Project</li>
      </ol>
      </section>
@endsection


@section('content')
@php
use Illuminate\Database\Eloquent\Collection;
use App\Models\Task;
@endphp
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Report</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                
                <!-- /.col -->
               <div class="col-md-12">


                <table class="table table-responsive">
                  <thead>
                    <tr>
                      <th>Project name</th>
                      <th>Total spend Hours</th>
                      <th>Description</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($tasks as $task)
                    <tr>
                      <td>{{$task->project->project_name}}</td>
                      <td>{{$task->hours}} Hours</td>
                      <td>{!!$task->comment!!}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>


               </div>
             </div>
           </div>
          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>

   
      <!-- /.row -->
      @endsection

@section('js')

@endsection