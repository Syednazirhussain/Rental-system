
<div class="wizard" id="wizard-basic">
    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li data-target="#wizard-1">
                <span class="wizard-step-number">1</span>
                <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
                <span class="wizard-step-caption">
          Add Room
          <span class="wizard-step-description">Add Room</span>
        </span>
            </li>
            <li data-target="#wizard-2">
                <span class="wizard-step-number">2</span>
                <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
                <span class="wizard-step-caption">
          Add Services
          <span class="wizard-step-description">Add Services</span>
        </span>
            </li>
        </ul>

            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Add Room</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('company.rooms.store') }}" method="POST" id="roomForm" enctype="multipart/form-data">

                            @include('company.rooms.fields')

                        </form>
                    </div>
                </div>
            </div>

{{ csrf_field() }}
@if(isset($room))
    <input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">
    <div class="col-sm-12 form-group">
        <label for="company_id">Company Name</label>
        <input type="text" id="company_id" class="form-control" value="@if(isset($company)){{ $company->name }}@endif" disabled>



    </div>
    <div class="wizard-content">
        <form action="{{ route('company.rooms.store') }}" name="createRoomForm" class="wizard-pane active" id="wizard-1" method="post" enctype="multipart/form-data">

            @if(isset($room))
                <input name="_method" type="hidden" value="PATCH">
            @endif

            <div class="row">
                <div class="col-sm-12 form-group">
                    <label for="company_id">Company Name</label>
                    <input type="text" id="company_id" class="form-control"
                           value="@if(isset($company)){{ $company->name }}@endif" disabled>
                </div>
                <div class="col-sm-12 form-group">
                    <label for="select_floor">Floor Name</label>
                    <select class="form-control" id="select_floor" name="floor_id">
                        @if(isset($room))
                            <option value="{{ $room->floor_id }}">{{ $floor_name }}</option>@endif
                        @foreach ($companyFloors as $floor)
                            <option value="{{ $floor->id }}"><span>{{ $companyBuildings[$floor->building_id] }}</span> -
                                Floor {{$floor->floor }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-12 form-group">
                    <label for="service_id">Select Service</label>
                    <select class="form-control" id="service_id" name="service_id">
                        @if(isset($room))
                            <option value="{{ $room->service_id }}">{{ $service_name }}</option>@endif
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{$service->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-12 form-group">
                    <label for="room_name">Room Name</label>
                    <input type="text" id="room_name" name="name" class="form-control"
                           value="@if(isset($room)){{ $room->name }}@endif">
                    <div class="errorTxt"></div>
                </div>
                <div class="col-sm-12 form-group">
                    <label for="room_area">Area</label>
                    <input type="number" id="room_area" name="area" class="form-control"
                           value="@if(isset($room)){{ $room->area }}@endif">
                    <div class="errorTxt"></div>
                </div>
                <div class="col-sm-12 form-group">
                    <label for="room_price">Price</label>
                    <input type="number" id="room_price" name="price" class="form-control"
                           value="@if(isset($room)){{ $room->price }}@endif">
                    <div class="errorTxt"></div>
                </div>
                <div class="col-sm-12 form-group">
                    <label for="security_code">Security Code</label>
                    <input type="text" id="security_code" name="security_code" class="form-control"
                           value="@if(isset($room)){{ $room->security_code }}@endif">
                    <div class="errorTxt"></div>
                </div>
                <div class="col-sm-12 form-group">
                    <label for="image1">Image 1</label>
                    <input type="file" id="image1" name="image1"
                           style="@if(isset($room)) @if($room->image1 !== '') display:none  @endif @endif">
                    @if(isset($room))
                        @if($room->image1 !== '')
                            <div class="col-sm-12" id="div_image1">
                                <img src="{{ asset('uploadedimages/'.$room->image1) }}" style="width:200px">
                            </div>
                            <div class="col-sm-12">
                                <button class="btn btn-link" id="edit_image1" onclick="editImage(1)">Edit</button>
                                <button class="btn btn-link" id="cancel_image1" onclick="cancelImage(1)"
                                        style="display:none">
                                    Cancel
                                </button>
                            </div>
                        @endif
                    @endif
                </div>
                <div class="col-sm-12 form-group">
                    <label for="image2">Image 2</label>
                    <input type="file" id="image2" name="image2"
                           style="@if(isset($room)) @if($room->image2 !== '') display:none  @endif @endif">
                    @if(isset($room))
                        @if($room->image2 !== '')
                            <div class="col-sm-12" id="div_image2">
                                <img src="{{ asset('uploadedimages/'.$room->image2) }}" style="width:200px">
                            </div>
                            <div class="col-sm-12">
                                <button class="btn btn-link" id="edit_image2" onclick="editImage(2)">Edit</button>
                                <button class="btn btn-link" id="cancel_image2" onclick="cancelImage(2)"
                                        style="display:none">
                                    Cancel
                                </button>
                            </div>
                        @endif
                    @endif
                </div>
                <div class="col-sm-12 form-group">
                    <label for="image3">Image 3</label>
                    <input type="file" id="image3" name="image3"
                           style="@if(isset($room)) @if($room->image3 !== '') display:none  @endif @endif">
                    @if(isset($room))
                        @if($room->image3 !== '')
                            <div class="col-sm-12" id="div_image3">
                                <img src="{{ asset('uploadedimages/'.$room->image3) }}" style="width:200px">
                            </div>
                            <div class="col-sm-12">
                                <button class="btn btn-link" id="edit_image3" onclick="editImage(3)">Edit</button>
                                <button class="btn btn-link" id="cancel_image3" onclick="cancelImage(3)"
                                        style="display:none">
                                    Cancel
                                </button>
                            </div>
                        @endif
                    @endif
                </div>
                <div class="col-sm-12 form-group">
                    <label for="image4">Image 4</label>
                    <input type="file" id="image4" name="image4"
                           style="@if(isset($room)) @if($room->image4 !== '') display:none  @endif @endif">
                    @if(isset($room))
                        @if($room->image4 !== '')
                            <div class="col-sm-12" id="div_image4">
                                <img src="{{ asset('uploadedimages/'.$room->image4) }}" style="width:200px">
                            </div>
                            <div class="col-sm-12">
                                <button class="btn btn-link" id="edit_image4" onclick="editImage(4)">Edit</button>
                                <button class="btn btn-link" id="cancel_image4" onclick="cancelImage(4)"
                                        style="display:none">
                                    Cancel
                                </button>
                            </div>
                        @endif
                    @endif
                </div>
                <div class="col-sm-12 form-group">
                    <label for="image5">Image 5</label>
                    <input type="file" id="image5" name="image5"
                           style="@if(isset($room)) @if($room->image5 !== '') display:none  @endif @endif">
                    @if(isset($room))
                        @if($room->image5 !== '')
                            <div class="col-sm-12" id="div_image5">
                                <img src="{{ asset('uploadedimages/'.$room->image5) }}" style="width:200px">
                            </div>
                            <div class="col-sm-12">
                                <button class="btn btn-link" id="edit_image5" onclick="editImage(5)">Edit</button>
                                <button class="btn btn-link" id="cancel_image5" onclick="cancelImage(5)"
                                        style="display:none">
                                    Cancel
                                </button>
                            </div>
                        @endif
                    @endif
                </div>
                <div class="pull-right">
                    <a href="{!! route('company.rooms.index') !!}" class="btn btn-default">Cancel</a>
                    @if (isset($room))
                        <button type="submit" class="btn btn-primary" id="updateRoomBtn" data-wizard-action="next">NEXT <i class="fa fa-arrow-right m-l-1"></i></button>
                    @else
                        <button type="submit" class="btn btn-primary" id="createRoomBtn" data-wizard-action="next">Create Room <i class="fa fa-arrow-right m-l-1"></i></button>
                    @endif
                </div>
            </div>
        </form>
        <form class="wizard-pane" id="wizard-2">
            <h4>Add Services to Room</h4>
            @if (isset($room))
                <input name="_method" type="hidden" value="PATCH">
            @endif
            <button type="button" class="btn btn-primary" id="addRoomBtn"> <i class="fa fa-plus"></i> Add More </button>

            <div id="sectionRoom">
                <div class="room">
                    @if (isset($room))
                        @foreach ($roomServices as $comModule)
                            <div class="moduleFields">
                                <input type="hidden" name="module[{{ $comModule->id }}][pk]" class="remove-module-id" value="{{ $comModule->id }}" />

                                <h5 class="bg-success p-x-1 p-y-1" >Service <i class="fa fa-times fa-lg remove-module pull-right cursor-p"></i></h5>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label for="module">Module</label>
                                        <select name="module[{{ $comModule->id }}][id]" class="module-id form-control" style="width: 100%" data-allow-clear="true">
                                            <option value="0">Select Module</option>
                                            @foreach ($companyServices as $module)
                                                @if ($module->id == $comModule->service_id)
                                                    <option value="{{ $module->id }}" selected="selected">{{ $module->name }}</option>
                                                @else
                                                    <option value="{{ $module->id }}">{{ $module->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <div class="errorTxt"></div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="price">Price</label>
                                        <input type="number" name="module[{{ $comModule->id }}][price]" class="module-price form-control" min="1" value="{{ $comModule->price }}" />
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                <a href="{!! route('company.rooms.index') !!}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary" data-wizard-action="finish">Finish</button>
            </div>
        </form>
    </div>
</div>


@section('js')
    <script type="text/javascript">
        function editImage(id) {
            event.preventDefault();
            document.getElementById('image' + id).style = 'display: block';
            document.getElementById('div_image' + id).style = 'display: none';
            document.getElementById('edit_image' + id).style = 'display: none';
            document.getElementById('cancel_image' + id).style = 'display: block';
        }

        function cancelImage(id) {
            event.preventDefault();
            document.getElementById('image' + id).style = 'display: none';
            document.getElementById('div_image' + id).style = 'display: block';
            document.getElementById('edit_image' + id).style = 'display: block';
            document.getElementById('cancel_image' + id).style = 'display: none';
        }

        $(function () {
            var $wizard = $('#wizard-basic')
            $wizard.pxWizard();

            var roomCreated = 0;
            var editRoom = "{{ isset($room) ? $room->id: 0 }}";
            var room_id = "{{ isset($room) ? $room->id: 0 }}";

            $('#wizard-1').validate({

                rules: {
                    'name': {
                        required:  true,
                    },
                    'area': {
                        required:  true,
                    },
                    'price': {
                        required:  true,
                    },
                    'security_code': {
                        required:  true,
                    },
                },
                errorPlacement: function(error, element) {
                    var placement = $(element).parent().find('.errorTxt');
                    if (placement) {
                        $(placement).append(error)
                    } else {
                        error.insertAfter(element);
                    }
                }

            });


            $('#wizard-1').on('submit', function(e) {

                e.preventDefault();

                // test if form is valid
                if( $('#wizard-1').validate().form() ) {

                    if (roomCreated == 0 && editRoom == 0) {

                        var myform = document.getElementById("wizard-1");
                        var data = new FormData(myform);

                        $.ajax({
                            url: '{{ route("company.rooms.store") }}',
                            data: data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            type: 'POST', // For jQuery < 1.9
                            success: function(data){
                                // myform.pxWizard('goTo', 2);
                                console.log(data);
                                if(data.success == 1) {
                                    room_id = data.room.id;
                                    roomCreated = data.success;
                                }
                                else {
                                    location.href = "/company/rooms";
                                }
                                // console.log(data);
                            },
                            error: function(xhr,status,error)  {

                            }

                        });

                    } else {

                        var myform = document.getElementById("wizard-1");
                        var data = new FormData(myform);

                        <?php
                          if (isset($room)) {
                             $updateRoute = route("company.rooms.update", [$room->id]);
                          } else {
                            $updateRoute = '';
                          }
                        ?>

                        $.ajax({
                            url: '{{ $updateRoute }}',
                            data: data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            type: 'POST', // For jQuery < 1.9
                            success: function(data){
                                // myform.pxWizard('goTo', 2);

                                // console.log(data);
                            },
                            error: function(xhr,status,error)  {

                            }

                        });

                    }

                } else {
                    // console.log("does not validate");
                }
            });

            // Validate

            $wizard.on('stepchange.px.wizard', function(e, data) {
                // Validate only if jump to the forward step
                if (data.nextStepIndex < data.activeStepIndex) { return; }

                var $form = $wizard.pxWizard('getActivePane');

                if (!$form.valid()) {
                    e.preventDefault();
                }
            });

            //Add Room Services
            var serviceList = {
                @foreach ($companyServices as $service)
                    {{ $service->id }}: "{{ $service->name }}",
                @endforeach
            };

            $(document).on('change', '.module-id', function() {


                // enable all options
                var thisModule = $(this);
                // thisModule.find('option').prop('disabled', false);

                // loop over each select, use its value to
                // disable the options in the other selects
                $('.module-id').find('option').prop('disabled', false);

                $('.module-id').each(function() {

                    if (this.value != 0) {
                        $('.module-id').not(this).find('option[value="' + this.value + '"]').prop('disabled', true);
                    }
                });
            });

            function moduleValidationRules() {
                $('.module-id').each(function () {
                    $(this).rules("add", {
                        required: true
                    });
                });
                $('.module-price').each(function () {
                    $(this).rules("add", {
                        required: true,
                        number: true,
                    });
                });

                $('.module-id').trigger('change');
            }

            var serviceNum = 0;

            $('#addRoomBtn').on('click', function() {

                if ($(".moduleFields").length < Object.keys(serviceList).length) {

                    var moduleIdName = "module["+serviceNum+"][id]";

                    var service = '<div class="roomFields">';
                    service += '<input type="hidden" name="module['+serviceNum+'][pk]" data-module-pk="new-'+serviceNum+'" class="remove-admin-id" value="new-'+serviceNum+'" />';
                    service += '<h5 class="bg-success p-x-1 p-y-1" >Module <i class="fa fa-times fa-lg remove-module pull-right cursor-p"></i></h5>';
                    service += '<div class="row">';
                    service += '<div class="col-sm-6 form-group">';
                    service += '<label for="module">Module</label>';
                    service += '<select name="module['+serviceNum+'][id]" data-module-id="new-'+serviceNum+'" class="module-id form-control" style="width: 100%" data-allow-clear="true">';
                    service += '</select>';
                    service += '<div class="errorTxt"></div>';
                    service += '</div>';
                    service += '<div class="col-sm-6 form-group">';
                    service += '<label for="price">Price</label>';
                    service += '<input type="number" name="module['+serviceNum+'][price]" data-module-price="new-'+serviceNum+'" class="module-price form-control" min="1" />';
                    service += '</div>'
                    service += '</div>';
                    service += '</div>';

                    $('.room').prepend(service);

                    // later:
                    var option = '';
                    option += '<option value="0">Select Module</option>';
                    $.each(serviceList, function (index, value) {
                        option += '<option value="'+index+'">'+value+'</option>';
                    });

                    $('select[name="' + moduleIdName + '"]').html(option);


                    serviceNum += 1;

                    moduleValidationRules();

                } else {
                    alert("Maximum services have been added");
                }

            });

            $(document).on('click', '.remove-module', function(e) {

                if (confirm('Are you sure?')) {

                    if (editRoom == 0) {
                        $(this).closest('.moduleFields').remove();;
                    } else {

                        var getModuleId = $(e.target).closest('.moduleFields').find('.remove-module-id').val();
                        // alert(getFloorId);

                        var data = { _method: "delete", module_id: getModuleId };

                        $.ajax({
                            url: '{{ route("company.companyServices.destroy") }}',
                            data: data,
                            cache: false,
                            type: 'POST', // For jQuery < 1.9
                            success: function(data){
                                // myform.pxWizard('goTo', 2);

                                // console.log(data);
                            },
                            error: function(xhr,status,error)  {

                            }

                        });

                        $(this).closest('.moduleFields').remove();
                    }

                }



            });

            jQuery.validator.addMethod("notEqualToGroup", function(value, element, options) {
                // get all the elements passed here with the same class
                var elems = $(element).parents('form').find(options[0]);
                // the value of the current element
                var valueToCompare = value;
                // count
                var matchesFound = 0;
                // loop each element and compare its value with the current value
                // and increase the count every time we find one
                jQuery.each(elems, function(){
                    thisVal = $(this).val();
                    if(thisVal == valueToCompare){
                        matchesFound++;
                    }
                });
                // count should be either 0 or 1 max
                if(this.optional(element) || matchesFound <= 1) {
                    //elems.removeClass('error');
                    return true;
                } else {
                    //elems.addClass('error');
                }
            });


            var serviceCreated = 0;

            $('#wizard-2').validate();

            $('#wizard-2').on('submit', function(e) {

                e.preventDefault();

                // test if form is valid
                if( $('#wizard-2').validate().form() ) {

                    if (editRoom == 0 && serviceCreated == 0) {
                        var myform = document.getElementById("wizard-2");
                        var data = new FormData(myform);
                        data.append('room_id', room_id);

                        // console.log(data);

                        $.ajax({
                            url: '{{ route("company.companyServices.store") }}',
                            data: data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            type: 'POST', // For jQuery < 1.9
                            success: function(data){
                                // myform.pxWizard('goTo', 2);

                                companyModuleCreated = data.success;

                                // console.log(data);
                            },
                            error: function(xhr,status,error)  {

                            }

                        });

                    } else {

                        var myform = document.getElementById("wizard-2");
                        var data = new FormData(myform);
                        data.append('room_id', room_id);

                        $.ajax({
                            url: '{{ route("company.companyServices.update") }}',
                            data: data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            type: 'POST', // For jQuery < 1.9
                            success: function(data){
                                // myform.pxWizard('goTo', 2);

                                $.each(data.createdFields, function (index, value) {

                                    $('input[data-module-pk="new-'+index+'"]').val(value);
                                    $('input[data-module-pk="new-'+index+'"]').attr('name', "module["+value+"][pk]");
                                    $('input[data-module-pk="new-'+index+'"]').attr("data-module-pk", value);

                                    $('select[data-module-id="new-'+index+'"]').attr('name', "module["+value+"][id]");
                                    $('select[data-module-id="new-'+index+'"]').attr("data-module-id", value);

                                    $('input[data-module-price="new-'+index+'"]').attr('name', "module["+value+"][price]");
                                    $('input[data-module-price="new-'+index+'"]').attr("data-module-price", value);

                                });


                                // console.log(data);
                            },
                            error: function(xhr,status,error)  {

                            }

                        });
                    }


                    // console.log("validates");
                } else {
                    // console.log("does not validate");
                }
            });
        });

    </script>
@endsection
