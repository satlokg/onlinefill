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
                  <th>Estimeted Hours</th>
                  <th>Spend Hours</th>
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
                  <td>{{$value->est_hours}}</td>
                  <td> @if($value->minuts($value->totalspendhour()) <= $value->minuts($value->est_hours))
                    <span class="label label-success">
                    @else
                     <span class="label label-danger">
                    @endif
                    {{$value->totalspendhour()}} hours
                    </span>
                    </td>
                  <td>
                    <a href="{{route('admin.projects.edit',['id'=>$value->id])}}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="{{route('admin.projects.detail',['id'=>encrypt($value->id,'vipra')])}}" class="btn btn-sm btn-success">View</a>
                   
                     <a href="{{ route('admin.projects.delete',['id'=>encrypt($value->id,'vipra')]) }}" class="text-danger pull-right"
                           data-tr="tr_{{$value->id}}"
                           data-toggle="confirmation"
                           data-btn-ok-label="Delete" data-btn-ok-icon="fa fa-remove"
                           data-btn-ok-class="btn btn-sm btn-danger"
                           data-btn-cancel-label="Cancel"
                           data-btn-cancel-icon="fa fa-chevron-circle-left"
                           data-btn-cancel-class="btn btn-sm btn-default"
                           data-title="Are you sure you want to delete ?"
                           data-placement="left" data-singleton="true">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/mistic100-Bootstrap-Confirmation/2.4.4/bootstrap-confirmation.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.trigger('confirm');
            }
        });


        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();


            $.ajax({
                url: ele.href,
                type: 'GET',
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });


            return false;
        });
    });
</script>
@endsection