<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($paymentMethod))
    <input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">
    <div class="col-sm-12 form-group">
        <label for="user_full_name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="@if(isset($paymentMethod)){{ $paymentMethod->name }}@endif">
    </div>
    <div class="col-sm-12 form-group">
        <label for="user_email">Code</label>
        <input type="text" name="code" id="code" class="form-control" value="@if(isset($paymentMethod)){{ $paymentMethod->code }}@endif">
    </div>

    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">@if(isset($paymentMethod)) <i class="fa fa-refresh"></i>  Update @else <i class="fa fa-plus"></i> Add @endif</button>
        <a href="{!! route('admin.paymentMethods.index') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>


@section('js')

    <script type="text/javascript">

        // Initialize validator
        $('#paymentForm').pxValidate({
            focusInvalid: false,
            rules: {
                'name': {
                    required: true
                },
                'code': {
                    required: true
                }
            }

        });


    </script>


@endsection
