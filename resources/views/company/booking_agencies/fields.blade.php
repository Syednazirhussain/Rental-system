<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($bookingAgency))
    <input name="_method" type="hidden" value="PATCH">
@endif




    <!-- Name Field -->
        <div class="row">
            <div class="col-sm-12 form-group">
                <label for="name">Agency Name:</label>
                <input type="text" id="name_id" name="name" placeholder="My Company" class="form-control" value="@if(isset($bookingAgency)){{ $bookingAgency->name }}@endif">
            </div>

<!-- Contact Person Field -->

            <div class="col-sm-6 form-group">
                <label for="contact_person">Contact Person:</label>
                <input type="text" placeholder="Jon Doe" id="contact_person" name="contact_person" class="form-control" value="@if(isset($bookingAgency)){{ $bookingAgency->contact_person }}@endif">
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


            <!-- Buildings Field -->



         <div class="col-sm-6 form-group">
          <label for="grid-input-16">Buildings</label>
            <select type="text" name="buildings[]" id="buildings" class="form-control select2-example" multiple>
            @if(isset($bookingAgency))

                     @foreach($companyBuilding as $compbuild)
                        <option value="{{ $compbuild->id }}" <?php foreach ($selectedCompany as $selct) { if($compbuild->id == $selct->id){ echo "selected"; }}  ?> >
                          {{$compbuild->name}}
                        </option>
                          
                      @endforeach


            @else
                     @foreach($companyBuilding as $compbuild)
                          <option value="{{ $compbuild->id }}">{{ ucwords($compbuild->name) }}</option>
                     @endforeach
            @endif
           </select>
          <label id="companyId-error" class="error" for="companyId"></label>
        </div>

<!-- Kick Back Fnb Field -->

            <div class="col-sm-6 form-group">
                <label for="kick_back_fnb">Kick Back Fnb:</label>
                <input type="text" value=" @if(isset($bookingAgency)){{ $bookingAgency->kick_back_fnb }} @else 50 @endif " name="kick_back_fnb" class="form-control">
   
            </div>


<!-- Kick Back Room Field -->

            <div class="col-sm-6 form-group">
                <label for="kick_back_room">Kick Back Room:</label>
                <input type="text" value=" @if(isset($bookingAgency)){{ $bookingAgency->kick_back_room }} @else 50 @endif " name="kick_back_room" class="form-control">
   
            </div>


        <!-- Submit Field -->
            <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">@if(isset($bookingAgency)) <i class="fa fa-refresh"></i>  Update Agency @else <i class="fa fa-plus"></i>  Add Agency @endif</button>
                    <a href="{!! route('company.bookingAgencies.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
                </div>
            </div>


@section('js')
    <script type="text/javascript">

        $('input[name="kick_back_room"]').TouchSpin({
        min:            0,
        max:            100,
        step:           0.1,
        decimals:       2,
        boostat:        5,
        maxboostedstep: 10,
        postfix:        '%'
      });

        $('input[name="kick_back_fnb"]').TouchSpin({
        min:            0,
        max:            100,
        step:           0.1,
        decimals:       2,
        boostat:        5,
        maxboostedstep: 10,
        postfix:        '%'
      });

                $(function() {
                      $('.select2-example').select2({
                        placeholder: 'Select Buildings',
                      });
                });


                
        var userRoleId = $('.userRoleId').attr('id');

        $('#permissions').on('select2:select', function (e) {
            var data = e.params.data;

            var jsObj = {
              'userRoleId' : userRoleId,
              'permissions' : data.id,
              'Action'     : 'Add'
            }

            console.log(jsObj);


            if (userRoleId == "" || userRoleId === null) {

            }
            else
            {
              $.post("{{ route('admin.users.changePermission') }}",jsObj,function(response){
                console.log(response);
              });
            }
        });

        $('#buildings').on('select2:unselect', function (e) {
            e.params.data = '';
            
            /*var jsObj = {
              'userRoleId' : userRoleId,
              'permissions' : data.id,
              'Action'     : 'Remove'
            }

            console.log(jsObj);

            if (userRoleId == "" || userRoleId === null) {

            }
            else
            {
                $.post("{{ route('admin.users.changePermission') }}",jsObj,function(response){
                  console.log(response);
                });
            }*/
        });

      $('#userRolesForm').on('submit', function(e) {

        var Permission =  $('#permissions').val();

        console.log(Permission);

        $('#per').val(Permission);

        return true;

      });



       
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
                    
                    email: true,
                    rangelength: [5, 50]
                },
                'mobile': {
                    
                    number: true,
                    rangelength: [8, 20]
                },
                'fax': {
                    
                    number: true,
                    rangelength: [8, 20]
                },
                'kick_back_fnb': {
                    required: true,
                    number: true,
                    maxlength: 10
                },
                'kick_back_room': {
                    required: true,
                    number: true,
                    maxlength: 10
                },
                'buildings[]': {
                    required: true
                }
            },

            messages: {
                'name': {
                    required: "Please enter agency name"
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
                'buildings[]': {
                    required: "Please select atleast one building"
                },
            }
        });

    </script>
@endsection
