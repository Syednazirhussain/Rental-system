<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($bookingAgency))
    <input name="_method" type="hidden" value="PATCH">
@endif




    <!-- Name Field -->
        <div class="row">
            <div class="col-sm-12 form-group">
                <label for="name">Company Name</label>
                <input type="text" id="name_id" name="name" placeholder="My Company" class="form-control" value="@if(isset($bookingAgency)){{ $bookingAgency->name }}@endif">
            </div>

<!-- Contact Person Field -->

            <div class="col-sm-6 form-group">
                <label for="contact_person">Contact Person</label>
                <input type="text" placeholder="Jon Doe" id="contact_person" name="contact_person" class="form-control" value="@if(isset($bookingAgency)){{ $bookingAgency->contact_person }}@endif">
            </div>

        <!-- company building Field -->

        <div class="col-sm-6 form-group">
          <label for="grid-input-16">Company</label>
          <select type="text" name="company_id" id="company_id" class="form-control">

           @if(isset($company))
              @foreach($company as $comp)
                  @if(isset($bookingAgency))
                    @if($comp->id == $bookingAgency->company_id)
                        <option value="{{ $comp->id }}" selected="selected">{{ $comp->name }}</option>
                    @else
                        <option value="{{ $comp->id }}" >{{ $comp->name }}</option>
                    @endif
                  @else
                    <option value="{{ $comp->id }}" >{{ $comp->name }}</option>
                  @endif
              @endforeach
           @endif


        </select>
          <label id="companyId-error" class="error" for="companyId"></label>
        </div>

<!-- Phone Field -->

            <div class="col-sm-6 form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" placeholder="0210234567" class="form-control" value="@if(isset($bookingAgency)){{ $bookingAgency->phone }}@endif">
            </div>

<!-- Email Field -->

            <div class="col-sm-6 form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="someone@mail.com" class="form-control" value="@if(isset($bookingAgency)){{ $bookingAgency->email }}@endif">
            </div>

<!-- Mobile Field -->
            <div class="col-sm-6 form-group">
                <label for="mobile">Mobile:</label>
                <input type="text" id="mobile" name="mobile" placeholder="03001234567" class="form-control" value="@if(isset($bookingAgency)){{ $bookingAgency->mobile }}@endif">
            </div>

<!-- Fax Field -->

            <div class="col-sm-6 form-group">
                <label for="fax">Fax:</label>
                <input type="text" id="fax" name="fax" placeholder="0214563217" class="form-control" value="@if(isset($bookingAgency)){{ $bookingAgency->fax }}@endif">
            </div>
<!-- Kick Back Fnb Field -->

            <div class="col-sm-6 form-group">
                <label for="kick_back_fnb">Kick Back Fnb:</label>
                <input type="text" id="kick_back_fnb" name="kick_back_fnb" placeholder="20 %" class="form-control" value="@if(isset($bookingAgency)){{ $bookingAgency->kick_back_fnb }}@endif">
            </div>

<!-- Kick Back Room Field -->

            <div class="col-sm-6 form-group">
                <label for="kick_back_room">Kick Back Room:</label>
                <input type="text" id="kick_back_room" name="kick_back_room" placeholder="20 %" class="form-control" value="@if(isset($bookingAgency)){{ $bookingAgency->kick_back_room }}@endif">
            </div>

        <!-- Buildings Field -->
            <div class="form-group col-sm-12 col-lg-12">
                <label for="kick_back_room">Buildings:</label>
                <textarea name="buildings" placeholder="Write buildings" class="form-control">@if(isset($bookingAgency)){{ $bookingAgency->buildings }}@endif</textarea>
               
            </div>
        <!-- Submit Field -->
            <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">@if(isset($bookingAgency)) <i class="fa fa-refresh"></i>  Update Agency @else <i class="fa fa-plus"></i>  Add Agency @endif</button>
                    <a href="{!! route('company.bookingAgencies.index') !!}" class="btn btn-default">Cancel</a>
                </div>
            </div>




@section('js')
    <script type="text/javascript">
       
        $('#bookingForm').pxValidate({
            focusInvalid: false,
            rules: {
                'name': {
                    required: true,
                    rangelength: [3, 20]
                },
                'contact_person': {
                    required: true,
                    rangelength: [3, 20]
                },
                'phone': {
                    required: true,
                    number: true,
                    rangelength: [8, 20]
                },
                'email': {
                    required: true,
                    email: true,
                    rangelength: [5, 50]
                },
                'mobile': {
                    required: true,
                    number: true,
                    rangelength: [8, 20]
                },
                'fax': {
                    required: true,
                    number: true,
                    rangelength: [8, 20]
                },
                'kick_back_fnb': {
                    required: true
                },
                'kick_back_room': {
                    required: true
                },
                'buildings': {
                    required: true,
                    rangelength: [5, 200]
                }
            },

            messages: {
                'name': {
                    required: "Please enter company name"
                },
                'contact_person': {
                    required: "Please enter contact person name"
                },
                'phone': {
                    required: "Please enter phone number"
                },
                'email': {
                    required: "Please enter email address"
                },
                'mobile': {
                    required: "Please enter mobile number"
                },
                'fax': {
                    required: "Please enter fax number"
                },
                'kick_back_fnb': {
                    required: "Please enter kick back f & b"
                },
                'kick_back_room': {
                    required: "Please enter kick back room"
                },
                'buildings': {
                    required: "Please enter buildings"
                },
            }
        });

    </script>
@endsection
