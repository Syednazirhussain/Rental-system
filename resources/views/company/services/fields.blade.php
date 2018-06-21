<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($service))
    <input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">
    <div class="col-sm-12 form-group">
        <label for="company_id">Company Name</label>
        <input type="text" id="company_id" class="form-control"
               value="@if(isset($company)){{ $company->name }}@endif" disabled>
    </div>
    <div class="col-sm-12 form-group">
        <label for="building_id">Service Name</label>
        <input type="text" id="building_id" name="name" class="form-control"
               value="@if(isset($service)){{ $service->name }}@endif">
    </div>
    <div class="col-sm-12 form-group">
        <label class="form-check-label">
            <input id="free_service" class="form-check-input" name="freeService" type="checkbox" onchange="freeCheckbox()"
                    @if(isset($free_service)) checked @endif>
            Free Service
        </label>
    </div>
    <div class="col-sm-12 form-group" id="service_price">
        <label for="price">Price</label>
        <input type="number" name="price" id="price" min="0" class="form-control" value="@if(isset($service)){{ $service->price }}@endif">
    </div>
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">@if(isset($service)) <i class="fa fa-refresh"></i>  Update @else <i class="fa fa-plus"></i>  Create @endif</button>
        <a href="{!! route('company.services.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
    </div>
</div>


@section('js')
    <script type="text/javascript">
        freeCheckbox();
        // Event when free service clicked
        function freeCheckbox() {
            if(document.getElementById('free_service').checked == true)
                document.getElementById('service_price').style.display = 'none';
            else
                document.getElementById('service_price').style.display = 'block';
        }
        // Initialize validator
        $('#serviceForm').pxValidate({
            focusInvalid: false,
            rules: {
                'name': {
                    required: true,
                    maxlength: 50
                },
                'price': {
                    required: true,
                    maxlength: 50,
                    number: true,
                }
            },

            messages: {
                'name': {
                    required: "Please enter the service name !",
                },
                'price': {
                    required: "Please enter the price !",
                }
            }
        });

    </script>
@endsection
