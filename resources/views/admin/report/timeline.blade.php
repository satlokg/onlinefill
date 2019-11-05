<div class="pull-right">
	<a href="{{route('admin.report.todayReport')}}" class="btn btn-sm btn-info pull-right"><i class="fa fa-refresh" aria-hidden="true"></i></a>
<div class="col-sm-3 pull-right">
	<form action="" method="get" class="form-horizontal">
	<div class="input-group input-group-sm">
		
		<input autocomplete="off" type="text" class="form-control pull-right" id="datepicker" name="date" value="{{$date}}">
	    <span class="input-group-btn">
	      <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-search" aria-hidden="true"></i></button>
	    </span>
	   
	</div>
	</form>
</div>	
	<a href="" class="btn btn-sm btn-info pull-right"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Excel</a>
</div>