 @extends('layouts.admin')
 @section('css')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
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
              <h3 class="box-title">Report Detail ({{$user_name}})</h3>
              @include('admin.project.timeline')
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                
                <!-- /.col -->
               <div class="col-md-12">


                <div id='calendar'></div>


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
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
           
             events : [
                @foreach($tasks as $date=>$task)
                {
                    title : '{{ $task[0]->AddPlayTime($task->pluck('hours')) }} Hours',
                    start : '{{ $date }}',
                    url : '{{ route('admin.user.report.detail',["date"=>$date,"key"=>encrypt($user_id,"vipra")]) }}'
                },
                @endforeach
            ]
        })
    });
</script>
@endsection