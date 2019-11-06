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
@endsection


@section('content')

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">{{$project->project_name}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                
                <!-- /.col -->
               <div class="col-md-12">
                <!-- /.col -->
               <table class="table table-bordered table-striped">
                <thead>
                <tr class="bg-yellow">
                  <th>Project Name</th>
                  <th>Technology</th>
                  <th>Delivery Date</th>
                  <th>Start And End Date</th>
                  <th>Project Manager</th>
                  <th>Estimeted Hours</th>
                  <th>Total Spend Hours</th>
                  <th>Assigned At</th>
                </tr>
                </thead>
                <tbody>
                
                 
                  <tr class="bg-green">
                  <td>{{$project->project_name}}</td>
                  <td>{{$project->technology}}</td>
                  <td>{{$project->delivery_date}}</td>
                  <td>{{$project->start_end}}</td>
                  <td>{{$project->projectManager($project->project_manager)}}</td>
                  <td>

                      {{$project->projecthour()->alloted_hours}} hours
                    
                  </td>
                  <td>
                     @if($project->minuts($project->spendhour()) <= $project->minuts($project->projecthour()->alloted_hours))
                    <span class="label label-success">
                    @else
                     <span class="label label-danger">
                    @endif
                    {{$project->spendhour()}} hours
                    </span>
                    </td>
                  <td>{{$project->projecthour()->created_at}}</td>
                 
                   </tr>
               
                </tbody>
                
              </table>
            </div>

                <!-- /.col -->
              </div>
              <div class="row">
        <div class="col-md-7">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">All Commrnt</a></li>
              <li><a href="#tab_2" data-toggle="tab">Project Description</a></li>
              <li><a href="#tab_3" data-toggle="tab">Project Documents</a></li>
              
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                @foreach($project->tasks as $task)
                @if($project->project_manager==$task->user_id)
                 <div class="box box-warning box-solid">
                @else
                  <div class="box box-info box-solid">
                @endif 
                    <div class="box-header with-border">
                      <h3 class="box-title">{{$task->user->name}}</h3>

                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      {!!$task->comment!!}

                      <b class="text-info">Documents</b><br>
                      @foreach($task->taskdocs as $doc)
                       <a href="{{url('/public/files/')}}/{{$doc->filename}}" target="_blank"> <i class="fa fa-paperclip"></i> {{$doc->filename}} </a>
                      @endforeach
                     
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <b class="text-warning">Spend Time</b>
                      {{$task->hours}} Hours

                      <b class="text-warning">   Time</b>
                      {{$task->created_at}}
                      <!-- /.box-tools -->
                    </div>
                  </div>
                  @endforeach
              </div>

              <div class="tab-pane" id="tab_2">
               
                 <div class="box box-info box-solid">
                    <div class="box-header with-border">
                      <h3 class="box-title">Description</h3>
                      <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                     {!!$project->description!!}
                     
                    </div>
                  
                  </div>
                 
              </div>

              <div class="tab-pane" id="tab_3">
               
                 <div class="box box-info box-solid">
                    <div class="box-header with-border">
                      <h3 class="box-title">Documents</h3>
                      <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <ul class="list-group-item d-flex justify-content-between align-items-center">
                             @foreach($project->files as $file)
                            <li class="list-group-item"><i class="fa fa-file-image-o" aria-hidden="true">  </i><a target="_blank" href="{{url('/public/files/')}}/{{$file->filename}}">  {{$file->filename}}</a>
                            </li>
                            @endforeach
                          </ul>
                     
                    </div>
                  
                  </div>
                 
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->

        <div class="col-md-5">
          <!-- Custom Tabs (Pulled to the right) -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#tab_1-1" data-toggle="tab">Commennt</a></li>
              <li><a href="#tab_2-2" data-toggle="tab">Assigned Users</a></li>
              <li class="pull-left header"><i class="fa fa-th"></i>Feedback</li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active bg-aqua" style="padding:5px;" id="tab_1-1">
              
                    <form method="POST" action="{{ route('user.projects.comment') }}" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="task[project_id]" value="{{$project->id}}">
                      <textarea class="textarea" name="task[comment]" placeholder="Place some text here"
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; color: #000"></textarea>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Enter Spend Hours</label>
                          <input type="text" name="task[hours]" class="form-control" id="time" placeholder="Enter Spend Hours">
                        </div>  
                        <div class="form-group">
                          <label for="exampleInputEmail1">Upload Document</label>
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

                       <div class="form-group">
                         <button class="btn btn-success btn-sm" type="submit">Submit</button>
                        </div> 
                    </form>
                 
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2-2">
                <ul class="list-group">
                @foreach($project->userhours as $user)
                  <li class="list-group-item">{{$user->name}} ({{$user->designation}}) ({{$user->technology}})</li>
                @endforeach
                </ul>
              </div>
             
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
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