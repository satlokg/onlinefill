 @extends('layouts.admin')
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
              @include('admin.project.timeline')
              
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
                  <th>Project Manager</th>
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
                  <td>{{$value->projectManager($value->project_manager)}}</td>
                  <td>
                    <a href="{{route('admin.projects.edit',['id'=>$value->id])}}" class="btn btn-sm btn-warning">Edit</a>
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