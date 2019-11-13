 @extends('layouts.admin')
 @section('css')
<link rel="stylesheet" href="{{asset('public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
 @endsection
 @section('bread')
 <section class="content-header">
      <h1>
        Report
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Report</li>
      </ol>
@endsection


@section('content')

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Report Detail </h3>
              @include('admin.report.timeline')
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                
                <!-- /.col -->
               <div class="col-md-12">


                <table class="table table-responsive table-bordered table-striped">
                  <thead>
                    <tr>
                      <td class="bg-green">Project/User</td>
                     
                     @foreach($users as $user)
                        @php
                        $arr = explode(' ',trim($user->name));
                        @endphp
                         <td class="bg-purple text-center">{{$arr[0]}}</td>
                      @endforeach
                      <td class="bg-purple">Total</td>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($projects as $project)
                    <tr>
                      
                      
                      <td class="bg-yellow">{{$project->project_name}}</td>
                       @foreach($users as $user)
                       @if($project->minuts($project->AddPlayTime($user->todaySpend($project->id,$user->id,$date)->pluck('hours'))) > 0)
                          <td class="bg-green">
                            {{$project->AddPlayTime($user->todaySpend($project->id,$user->id,$date)->pluck('hours'))}} 
                       @else
                         <td class="bg-grey">

                       @endif
                           
                         </td>
                         
                      @endforeach
                      @if($project->minuts($project->AddPlayTime($project->todaySpend($project->id,$date)->pluck('hours'))) > 0)
                          <td class="bg-orange">
                             {{$project->AddPlayTime($project->todaySpend($project->id,$date)->pluck('hours'))}} </td>
                       @else
                         <td class="bg-grey"></td>
                       @endif
                         
                    </tr>
                    @endforeach
                    <tr>
                      <td class="bg-primary">Total Hours</td>
                     
                     @foreach($users as $user)
                        @if($user->minuts($user->AddPlayTime($user->allTodaySpend($user->id,$date)->pluck('hours'))) > 0)
                         <td class="bg-primary text-center">{{$user->AddPlayTime($user->allTodaySpend($user->id,$date)->pluck('hours'))}}</td>
                         @else
                         <td class="bg-primary"></td>
                       @endif
                      @endforeach
                      <td class="bg-primary"></td>
                    </tr>
                  </tbody>
                </table>



               </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

   
      <!-- /.row -->
      @endsection

@section('js')
<script src="{{asset('public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript">
  $('#datepicker').datepicker({
      autoclose: true,
       format: 'yyyy-mm-dd',
    })
</script>
@endsection