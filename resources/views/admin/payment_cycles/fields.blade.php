<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($paymentCycle))
    <input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">
    <div class="col-sm-12 form-group">
        <label for="user_full_name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="@if(isset($paymentCycle)){{ $paymentCycle->name }}@endif">
    </div>


    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">@if(isset($paymentCycle)) <i class="fa fa-refresh"></i>  Update @else <i class="fa fa-plus"></i> Add @endif</button>
        <a href="{!! route('admin.paymentCycles.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
    </div>
</div>


@section('js')

    <script type="text/javascript">

        // Initialize validator
        $('#paymentCycForm').pxValidate({
            focusInvalid: false,
            rules: {
                'name': {
                    required: true
                }
            }

        });


    </script>


@endsection
