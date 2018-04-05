
<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($userRole))
	<input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">                           
	                                
	<div class="col-sm-12 form-group">
    	<label for="code">Code</label>
        <input type="text" name="code" id="code" class="form-control" value="@if(isset($userRole)){{$userRole->code}}@endif">
	</div>

	<div class="col-sm-12 form-group">
    	<label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="@if(isset($userRole)){{$userRole->name}}@endif">
	</div>

	<div class="col-sm-12">
		<button type="submit" class="btn btn-primary">@if(isset($userRole)) <i class="fa fa-refresh"></i>  Update Role @else <i class="fa fa-plus"></i>  Add Role @endif</button>
	    <a href="{!! route('admin.userRoles.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
	</div>

</div>
