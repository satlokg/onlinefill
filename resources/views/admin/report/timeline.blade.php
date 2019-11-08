<div class="pull-right">
	<a href="{{route('admin.report.todayReport')}}" class="btn btn-sm btn-info pull-right"><i class="fa fa-refresh" aria-hidden="true"></i></a>
<div class="col-sm-3 pull-right">
	<form action="" method="get" class="form-horizontal">
	<div class="input-group input-group-sm">
		
		<input autocomplete="off" type="text" class="form-control pull-right" id="datepicker" name="date" value="{{$date}}">
		<span class="input-group-btn">
		<button class="btn btn-info btn-flat"><i class="fa fa-calendar" aria-hidden="true"></i></button>
		</span>
	    <span class="input-group-btn">
	      <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-search" aria-hidden="true"></i></button>
	    </span>
	   
	</div>
	</form>
</div>	
	<a href="{{route('admin.report.download',['type'=>'xlsx','date'=>$date])}}" class="btn btn-sm btn-info pull-right" style="margin-left: 10px;"><i class="fa fa-file-excel-o  text-success" aria-hidden="true"></i> Export Excel</a>  &nbsp;
	<a href="{{route('admin.report.download',['type'=>'csv','date'=>$date])}}" class="btn btn-sm btn-info pull-right" style="margin-left: 10px;"><i class="fa fa-file-pdf-o  text-success" aria-hidden="true"></i> Export CSV</a>
	<!-- <a href="{{route('admin.report.download',['type'=>'pdf'])}}" class="btn btn-sm btn-info pull-right" style="margin-left: 10px;"><i class="fa fa-file-pdf-o  text-success" aria-hidden="true"></i> Export PDF</a> -->
</div>