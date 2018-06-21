<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($companyBuilding))
    <input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">
    <div class="col-sm-12 form-group">
        <label for="company_building_name">Name:</label>
        <input type="text" name="name" id="company_building_name" class="form-control" value="@if(isset($companyBuilding)){{ $companyBuilding->name }}@endif">
    </div>
    <div class="col-sm-12 form-group">
        <label for="company_building_address">Address:</label>
        <input type="text" name="address" id="company_building_address" class="form-control" value="@if(isset($companyBuilding)){{ $companyBuilding->address }}@endif">
    </div>
    <div class="col-sm-12 form-group">
        <label for="company_building_num_floors">Zipcode:</label>
        <input type="text" name="zipcode" id="company_building_zipcode" class="form-control" value="@if(isset($companyBuilding)){{ $companyBuilding->zipcode }}@endif">
    </div>
    <div class="col-sm-12 form-group">
        <label for="company_building_num_floors">Num Floors:</label>
        <input type="number" id="company_building_num_floors" class="form-control" value="@if(isset($companyBuilding)){{ $companyBuilding->num_floors }}@endif" disabled>
    </div>
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">@if(isset($companyBuilding)) <i class="fa fa-refresh"></i>  Update @else <i class="fa fa-plus"></i>  Create @endif</button>
        <a href="{!! route('company.companyBuildings.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
    </div>
</div>


@section('js')

    <script type="text/javascript">

        // Initialize validator
        $('#buildingForm').pxValidate({
            focusInvalid: false,
            rules: {
                'name': {
                    required: true,
                    maxlength: 50,
                },
                'address': {
                    required: true,
                    maxlength: 50,
                },
                'zipcode': {
                    required: true,
                    maxlength: 20,
                },
                'num_floors': {
                    required: true,
                },
            },

            messages: {
                'name': {
                    required: "Please enter the name",
                },
                'address': {
                    required: "Please enter the address",
                },
                'zipcode': {
                    required: "Please enter the zipcode",
                }
            }

        });

    </script>
@endsection