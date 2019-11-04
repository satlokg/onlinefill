@extends('layouts.user')
@section('css')
<link rel="stylesheet" href="{{asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
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


                <div id='calendar'></div>


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
                    title : '{{ $task->sum('hours') }} Hours',
                    start : '{{ $date }}',
                    url : '{{ route('user.report.detail',["date"=>$date]) }}'
                },
                @endforeach
            ]
        })
    });
</script>
@endsection