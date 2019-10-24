 @extends('layouts.admin')
 @section('css')
<link rel="stylesheet" href="{{asset('public/bower_components/select2/dist/css/select2.min.css')}}">
 <link rel="stylesheet" href="{{asset('public/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
<link rel="stylesheet" href="{{asset('public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
<style type="text/css">
  .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #2522d4;
    border: 1px solid #aaa;
    border-radius: 4px;
    cursor: default;
    float: left;
    margin-right: 5px;
    margin-top: 5px;
    padding: 0 5px;
</style>
 @endsection
 @section('bread')
 <section class="content-header">
      <h1>
        Project
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Project</li>
        <li class="active">Add</li>
      </ol>
@endsection


@section('content')

      <div class="row">
        <div class="col-md-12">
           <form method="POST" action="{{ route('admin.projects.projectPost') }}" enctype="multipart/form-data">
            @csrf
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add Project</h3>
              @include('admin.project.timeline')
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                
                <!-- /.col -->
                <div class="col-md-6">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Quick Information</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Project Name</label>
                          <input type="text" name="project_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Project Name">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Technology</label>
                          <input type="text" name="technology" class="form-control" id="exampleInputPassword1" placeholder="Technology">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Total Estimated Hours</label>
                          <input type="text" name="est_hours" class="form-control" id="exampleInputPassword1" placeholder="Total Estimated Hours">
                        </div>
                        <div class="form-group">
                          <label>Start And End Date</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input name="start_end" type="text" class="form-control pull-right" id="reservation">
                          </div>
                      <!-- /.input group -->
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Delivery Date</label>
                          <input type="text" name="delivery_date" class="form-control" id="datepicker" placeholder="Delivery Date">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Git Repo</label>
                          <input type="text" name="git_repo" class="form-control" id="exampleInputPassword1" placeholder="Git Repo">
                        </div>

                       <div class="form-group">
                        <label>Project Manager</label>
                        <select name="project_manager" class="form-control select2" style="width: 100%;">
                          @foreach($users as $user)
                          <option value="{{$user->id}}">{{$user->name}} ({{$user->designation}})</option>
                          @endforeach
                        </select>
                      </div>
                      <!-- /.box-body -->
                      <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                     </div>
                  </div>
          <!-- /.box -->
                </div>
                <!-- /.col -->
              </div>


              <div class="col-md-6">
                  <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Quick Information</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                    <div class="box-body">
                     
                    <!-- /.box-body -->
                     <div class="form-group">
                        <label>Assign Project</label>
                        <select class="form-control select2" multiple="multiple" data-placeholder="Select User" style="width: 100%;" name="assign_user[]">
                          @foreach($users as $user)
                          <option value="{{$user->id}}">{{$user->name}} ({{$user->designation}})</option>
                          @endforeach
                        </select>
                      </div>
                   
                     </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Upload Project Documents</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                    <div class="box-body">
                      @if (count($errors) > 0)
                      <div class="alert alert-danger">
                          <strong>Sorry!</strong> There were more problems with your HTML input.<br><br>
                          <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                      </div>
                      @endif
                      @if(session('success'))
                      <div class="alert alert-success">
                        {{ session('success') }}
                      </div> 
                      @endif
                     <div class="input-group hdtuto control-group lst increment" >
                        <input type="file" name="filenames[]" class="myfrm form-control">
                        <div class="input-group-btn"> 
                          <button class="btn btn-success btn-add" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                        </div>
                      </div>
                      <div class="clone hide">
                        <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                          <input type="file" name="filenames[]" class="myfrm form-control">
                          <div class="input-group-btn"> 
                            <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                          </div>
                        </div>
                      </div>
                    
                   
                     </div>
                    <!-- /.box -->
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-sm btn-success pull-right">Save</button>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          </form>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

   
      <!-- /.row -->
      @endsection

@section('js')
<script src="{{asset('public/bower_components/moment/min/moment.min.js')}}"></script>
<script>
(function($) {
    $(function() {
        window.fs_test = $('.test').fSelect();
    });
})(jQuery);
</script>
<script src="{{asset('public/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script>
(function($) {
     $('.select2').select2()
})(jQuery);
</script>.
<script src="{{asset('public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('public/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script type="text/javascript">
  $('#datepicker').datepicker({
      autoclose: true
    })
  $('#reservation').daterangepicker()
</script>
<script src="{{asset('public/bower_components/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
<script type="text/javascript">

    $(document).ready(function() {

      $(".btn-add").click(function(){ 

          var lsthmtl = $(".clone").html();

          $(".increment").after(lsthmtl);

      });

      $(".box-body").on("click",".btn-danger",function(){ 

          $(this).parents(".hdtuto").remove();

      });

    });

</script>
@endsection