


<div class="row">
			<!-- Name Field -->
            <div class="col-sm-12 form-group">
			    {!! Form::label('name', 'Status Name:') !!}
			    {!! Form::text('name', null, ['class' => 'form-control']) !!}
			</div>

			<!-- Submit Field -->
			<div class="col-sm-12">
			    {!! Form::submit('Add Status', ['class' => 'btn btn-primary']) !!}
			    <a href="{!! route('admin.userStatuses.index') !!}" class="btn btn-default">Cancel</a>
			</div>
</div>								


