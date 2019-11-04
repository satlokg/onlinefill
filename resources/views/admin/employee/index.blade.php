 @extends('layouts.admin')
 @section('css')

 @endsection
 @section('bread')
 <section class="content-header">
      <h1>
        Employee
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Employee</li>
      </ol>
@endsection


@section('content')

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Employee Detail</h3>
              @include('admin.employee.timeline')
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                <!-- /.col -->
               <table id="emp" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Emp Id</th>
                  <th>Name</th>
                  <th>Email(s)</th>
                  <th>Phone</th>
                  <th>Technology</th>
                  <th>Designation</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                
                  @foreach($users as $key=>$value)
                  <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$value->emp_id}}</td>
                  <td>{{$value->name}}</td>
                  <td>{{$value->email}}</td>
                  <td>{{$value->phone}}</td>
                  <td>{{$value->technology}}</td>
                  <td>{{$value->designation}}</td>
                  <td>
                    <a href="{{route('admin.employee.edit',['id'=>$value->id])}}" class="btn btn-sm btn-warning">Edit</a>

                    <a href="{{route('admin.user.report',['id'=>encrypt($value->id,'vipra')])}}" class="btn btn-sm btn-success"> Report</a>
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