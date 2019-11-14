@extends('layouts.user')
@section('css')

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
@endsection


@section('content')

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Project Detail</h3>
              <div class="pull-right">
                @if($at && $at->status==1)
                <a href="{{route('user.project.stop',['ids'=>$at->id])}}" class="btn btn-sm btn-danger pull-right">Stop Day</a>
                @else
                <a href="{{route('user.project.start')}}" class="btn btn-sm btn-info pull-right">Start Day</a>
                @endif
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                
                <!-- /.col -->
               <div class="col-md-12">
                <!-- /.col -->
               <table id="emp" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Project Name</th>
                  <th>Technology</th>
                  <th>Delivery Date</th>
                  <th>Start And End Date</th>
                  <th>Project Manager</th>
                  <th>Estimeted Hours</th>
                  <th>Total Spend Hours</th>
                  <th>Assigned At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                
                  @foreach($projects as $key=>$value) 
                  <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$value->project_name}}</td>
                  <td>{{$value->technology}}</td>
                  <td>{{$value->delivery_date}}</td>
                  <td>{{$value->start_end}}</td>
                  <td>{{$value->projectManager($value->project_manager)}}</td>
                  <td><span class="label label-success">{{$value->pivot->alloted_hours}} hours</span></td>
                 
                    <td>
                     @if($value->minuts($value->spendhour()) <= $value->minuts($value->projecthour()->alloted_hours))
                    <span class="label label-success">
                    @else
                     <span class="label label-danger">
                    @endif
                    {{$value->spendhour()}} hours
                    </span>
                    </td>
                 
                  <td>{{$value->pivot->created_at}}</td>
                  <td>
                    
                    @if($value->status==1)
                    <a href="{{route('user.projects.detail',['id'=>encrypt($value->id,'vipra')])}}" class="btn btn-sm btn-warning">View</a>
                    @else

                    @endif
                  </td>
                   </tr>
                  @endforeach
               
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
<script>
(function($) {
    $(function() {
        window.fs_test = $('.test').fSelect();
    });
})(jQuery);
</script>
<script>
  $(function () {
    $('#emp').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
@endsection