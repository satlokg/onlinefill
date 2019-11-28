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
        Potential
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">CRM</li>
        <li class="active">Potential</li>
        <li class="active">Add</li>
      </ol>
@endsection


@section('content')

      <div class="row">
        <div class="col-md-12">
           <form method="POST" action="{{ route('admin.crm.potential.addPost') }}" enctype="multipart/form-data">
            @csrf
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add Potential</h3>
              @include('admin.crm.timeline')
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                
                <!-- /.col -->
                <div class="col-md-6">
                  <div class="box box-info">
                      <div class="box-header with-border">
                        <h3 class="box-title">Potential Detail</h3>

                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                       <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Potential Name') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control input-sm" name="potential[name]" value="" required autocomplete="name" autofocus>

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="owner" class="col-md-4 col-form-label text-md-right">{{ __('Owner Name') }}</label>

                            <div class="col-md-8">
                                <input id="owner" type="text" class="form-control input-sm" name="potential[owner]" value="" required autocomplete="owner" autofocus>

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lead_source" class="col-md-4 col-form-label text-md-right">{{ __('Lead Source') }}</label>

                            <div class="col-md-8">
                                <input id="lead_source" type="text" class="form-control input-sm" name="potential[lead_source]" value="" required autocomplete="lead_source" autofocus>

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-8">
                                <input id="phone" type="text" class="form-control input-sm" name="potential[phone]" value="" required autocomplete="phone" autofocus>

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="website" class="col-md-4 col-form-label text-md-right">{{ __('Website') }}</label>

                            <div class="col-md-8">
                                <input id="website" type="text" class="form-control input-sm" name="potential[website]" value="" required autocomplete="website" autofocus>

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="service" class="col-md-4 col-form-label text-md-right">{{ __('Service') }}</label>

                            <div class="col-md-8">
                                <input id="service" type="text" class="form-control input-sm" name="potential[service]" value="" required autocomplete="service" autofocus>

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lead_by" class="col-md-4 col-form-label text-md-right">{{ __('Lead By') }}</label>

                            <div class="col-md-8">
                                <input id="lead_by" type="text" class="form-control input-sm" name="potential[lead_by]" value="" required autocomplete="lead_by" autofocus>

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="shift" class="col-md-4 col-form-label text-md-right">{{ __('Shift') }}</label>

                            <div class="col-md-8">
                                <input id="shift" type="text" class="form-control input-sm" name="potential[shift]" value="" required autocomplete="shift" autofocus>

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="discription" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-8">
                                <input id="discription" type="text" class="form-control input-sm" name="potential[discription]" value="" required autocomplete="discription" autofocus>

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>

                            <div class="col-md-8">
                                <input id="amount" type="text" class="form-control input-sm" name="potential[amount]" value="" required autocomplete="amount" autofocus>

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="demo_host" class="col-md-4 col-form-label text-md-right">{{ __('Demo Host') }}</label>

                            <div class="col-md-8">
                                <input id="demo_host" type="text" class="form-control input-sm" name="potential[demo_host]" value="" required autocomplete="demo_host" autofocus>

                                
                            </div>
                        </div>

                      </div>
                      <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.col -->
                 <!-- /.col -->
                <div class="col-md-6">
                  <div class="box box-info">
                      <div class="box-header with-border">
                        <h3 class="box-title">Contact Detail</h3>

                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                       <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control input-sm" name="contact[name]" value="" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                            <div class="col-md-8">
                                <input id="email" type="text" class="form-control input-sm" name="contact[email]" value="" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                            <div class="col-md-8">
                                <input id="phone" type="text" class="form-control input-sm" name="contact[phone]" value="" required autocomplete="phone" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="chat_id" class="col-md-4 col-form-label text-md-right">{{ __('Communication ID') }}</label>
                            <div class="col-md-8">
                                <select class="form-control input-sm" name="contact[chat_type]">
                                  <option value="slack">Slack</option>
                                  <option value="skype">Skype</option>
                                  <option value="trello">Trello</option>
                                </select>
                                <input id="chat_id" type="text" class="form-control input-sm" name="contact[chat_id]" value="" required autocomplete="chat_id" autofocus>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="locatiom" class="col-md-4 col-form-label text-md-right">{{ __('Locatiom') }}</label>
                            <div class="col-md-8">
                                <input id="locatiom" type="text" class="form-control input-sm" name="contact[locatiom]" value="" required autocomplete="locatiom" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                            <div class="col-md-8">
                                <select class="form-control input-sm" name="contact[role]">
                                  <option value="Decision Maker">Decision Maker</option>
                                  <option value="Tester">Tester</option>
                                </select>
                            </div>
                        </div>

                      </div>
                      <!-- /.box-body -->
                    </div>
                </div>

                 <!-- /.col -->
                <div class="col-md-6">
                  <div class="box box-info">
                      <div class="box-header with-border">
                        <h3 class="box-title">Attachments</h3>

                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>
                        </div>
                      </div>
                      <!-- /.box-header -->
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
                      <!-- /.box-body -->
                    </div>
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