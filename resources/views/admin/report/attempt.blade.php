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
             <div class="pull-right">
  <a href="{{route('admin.report.attempt')}}" class="btn btn-sm btn-info pull-right"><i class="fa fa-refresh" aria-hidden="true"></i></a>
<div class="col-sm-3 pull-right">
  <form action="" method="get" class="form-horizontal">
  <div class="input-group input-group-sm">
    <span class="input-group-btn">
    <button class="btn btn-info btn-flat"><i class="fa fa-calendar" aria-hidden="true"></i></button>
    </span>
    <input autocomplete="off" type="text" class="form-control pull-right" id="datepicker" name="date" value="{{$date}}" placeholder="Please Select Date">
    
      <span class="input-group-btn">
        <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-search" aria-hidden="true"></i></button>
      </span>
     
  </div>
  </form>
</div>  

</div>
              
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
                      
                          
                            @if($project->todayAttempt($project->id,$user->id,$date)!='00:00:00')
                            <td class="bg-green">
                            {{$project->todayAttempt($project->id,$user->id,$date)}} 
                            </td>
                            @else
                            <td>
                               @if($project->todayRunning($project->id,$user->id,$date)==1)
                                <span class="label label-info">Working</span>
                               @endif
                           </td>
                            @endif
                         </td>
                         
                      @endforeach
                     
                          <td class="bg-orange">
                              
                            @if($project->totalTodayAttempt($project->id,$date)!='00:00:00')
                            {{$project->totalTodayAttempt($project->id,$date)}}
                            @endif
                         </td>
                    </tr>
                    @endforeach
                    <tr>
                      <td class="bg-primary">Total Hours</td>
                     
                     @foreach($users as $user)
                       
                         <td class="bg-primary text-center">
                          @if($user->totalTodayAttempt($user->id,$date)!='00:00:00')
                            {{$user->totalTodayAttempt($user->id,$date)}}
                            @endif
                        </td>
                        
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