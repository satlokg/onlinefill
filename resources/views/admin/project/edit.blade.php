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

    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <input type="hidden" name="id" value="{{$project->id}}">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">{{$project->project_name}}</h3>
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
                          <input type="text" name="project_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Project Name" value="{{$project->project_name}}">
                        </div>
                         <div class="form-group">
                          <label for="exampleInputPassword1">Technology</label>
                          <input type="text" name="technology" class="form-control" id="exampleInputPassword1" placeholder="Technology" value="{{$project->technology}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Total Estimated Hours</label>
                          <input type="text" name="est_hours" class="form-control" id="time" placeholder="Total Estimated Hours" value="{{$project->est_hours}}">
                        </div>
                        <div class="form-group">
                          <label>Start And End Date</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input name="start_end" type="text" class="form-control pull-right" id="reservation"  value="{{$project->start_end}}">
                          </div>
                      <!-- /.input group -->
                        </div>
                        
                        <div class="form-group">
                          <label for="exampleInputPassword1">Delivery Date</label>
                          <input type="text" name="delivery_date" class="form-control" id="datepicker" placeholder="Delivery Date" value="{{$project->delivery_date}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Git Repo</label>
                          <input type="text" name="git_repo" class="form-control" id="exampleInputPassword1" placeholder="Git Repo" value="{{$project->git_repo}}">
                        </div>

                       <div class="form-group">
                        <label>Project Manager</label>
                        <select name="project_manager" class="form-control select2" style="width: 100%;">
                          @foreach($users as $user)
                          <option value="{{$user->id}}" {{($user->id==$project->project_manager)?'selected':''}}>{{$user->name}} ({{$user->designation}})</option>
                          @endforeach
                        </select>
                      </div>

                              
                      <!-- /.box-body -->
                        <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$project->description}}</textarea>
                     </div>
                     
                  </div>
          <!-- /.box -->
                </div>
                <!-- /.col -->
              </div>
              <div class="col-md-6">
                 @php
                         $project->users ? $selected=$project->users->pluck('id')->toArray() : $selected=[];
                         @endphp
                  <!-- general form elements -->
               <!--  <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Active User</h3>
                  </div>
               
                    <div class="box-body">
                     
                     <div class="form-group">
                         @php
                         $project->users ? $selected=$project->users->pluck('id')->toArray() : $selected=[];
                         @endphp
                        <select class="form-control select2" multiple="multiple" data-placeholder="Select User" style="width: 100%;" name="assign_user[]">
                          @foreach($users as $user)
                          <option value="{{$user->id}}" {{in_array($user->id, $selected)?'selected':''}}>{{$user->name}} ({{$user->designation}})</option>
                          @endforeach
                        </select>
                      </div>
                   
                     </div>
                </div> -->


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
                      <div class="row"><br>
                      <div class="col-md-12 mt-10">
                          <ul class="list-group-item d-flex justify-content-between align-items-center">
                             @foreach($project->files as $file)
                            <li class="list-group-item"><i class="fa fa-file-image-o" aria-hidden="true">  </i><a target="_blank" href="{{url('/public/files/')}}/{{$file->filename}}">  {{$file->filename}}</a>
                             <a href="{{ route('admin.project.delete.file',['id'=>$file->id]) }}" class="text-danger pull-right"
                           data-tr="tr_{{$file->id}}"
                           data-toggle="confirmation"
                           data-btn-ok-label="Delete" data-btn-ok-icon="fa fa-remove"
                           data-btn-ok-class="btn btn-sm btn-danger"
                           data-btn-cancel-label="Cancel"
                           data-btn-cancel-icon="fa fa-chevron-circle-left"
                           data-btn-cancel-class="btn btn-sm btn-default"
                           data-title="Are you sure you want to delete ?"
                           data-placement="left" data-singleton="true">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </a></li>
                            @endforeach
                          </ul>
                      </div>                        
                      </div>
                    
                     </div>
                    <!-- /.box -->
                </div>


                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Assign User</h3>
                    <a href="#" class="btn btn-sm btn-info pull-right"  data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i></a>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <div class="box-body">
                    <div class="row"><br>
                      <div class="col-md-12 mt-10">
                          <ul class="list-group-item d-flex justify-content-between align-items-center">
                              @foreach($project->userhours as $key=>$user)
                            <li class="list-group-item{{!in_array($user->id, $selected)?' bg-gray':''}}"><i class="fa fa-user-circle-o" aria-hidden="true"></i><a target="_blank" href="#"> {{$user->name}} ({{$user->designation}})</a>
                            &nbsp;&nbsp;&nbsp;
                            <input type="hidden" name="hours[{{$key}}][user_id]" value="{{$user->id}}">
                                  Hours
                              <input type="text" value="{{$user->pivot->alloted_hours}}" name="hours[{{$key}}][alloted_hours]" id="time" style="width: 50px; border: 1px solid green" {{!in_array($user->id, $selected)?'disabled':''}}>
                            spend hours 
                             @if($project->minuts($project->spendhour($user->id)) <= $project->minuts($project->projecthour($user->id)->alloted_hours))
                              <span class="label label-success">
                              @else
                               <span class="label label-danger">
                              @endif
                              {{$project->spendhour($user->id)}} hours
                              </span>
                             <a href="{{ route('admin.project.delete.user',['id'=>$user->id,'pid'=>$project->id]) }}" class="text-danger pull-right"
                           data-tr="tr_{{$user->id}}"
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
                             </li>
                            @endforeach
                          </ul>
                      </div>                        
                      </div>
                    

                  </div>
                </div>


                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Status</h3>
                    <a href="#" class="btn btn-sm btn-info pull-right"  data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i></a>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <div class="box-body">
                    <div class="row"><br>
                      <div class="col-md-12 mt-10">
                          <select class="form-control" name="status">
                            <option value="2" {{($project->status==2)?'selected':''}}>Live</option>
                            <option value="1" {{($project->status==1)?'selected':''}}>Working</option>
                            <option value="0" {{($project->status==0)?'selected':''}}>Hole</option>
                          </select>
                      </div>                        
                      </div>
                    

                  </div>
                </div>
                <!-- /.col -->
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form method="POST" action="{{ route('admin.add.user') }}">
      <div class="modal-body">
       
          @csrf
          <input type="hidden" name="project_id" value="{{$project->id}}">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Users:</label>
             <select class="form-control test" multiple="multiple" data-placeholder="Select User" style="width: 100%;" name="assign_user[]">
                          @foreach($users as $user)
                          @if(in_array($user->id, $selected))
                          @continue;
                          @endif
                          <option value="{{$user->id}}">{{$user->name}} ({{$user->designation}})</option>
                          @endforeach
                        </select>
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
       </form>
    </div>
  </div>
</div>
   
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