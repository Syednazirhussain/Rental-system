<script type="text/javascript">
    //Global Value
    var customer_id = "{{ isset($customer) ? $customer->id: 0 }}";
    var contact_id = "{{ isset($contact) ? $contact->id: 0 }}";
    var invoice_id = "{{ isset($invoice) ? $invoice->id: 0 }}";
    var company_id = "{{ isset($company_id) ? $company_id: 0 }}";

    var customer_address_1 = "{{ isset($customer) ? $customer->address_1: 0 }}";
    var customer_address_2 = "{{ isset($customer) ? $customer->address_2: 0 }}";
    var customer_zipcode = "{{ isset($customer) ? $customer->zipcode: 0 }}";
    var customer_city = "{{ isset($customer) ? $customer->city: 0 }}";
    var customer_country = "{{ isset($customer) ? $customer->country: 0 }}";
    /**
     * jQuery Validation for all fields
     **/
    // Initialize validator
    $('#customer_form').pxValidate({
        focusInvalid: false,
        rules: {
            'name': {
                required: true,
                minlength: 3,
                maxlength: 100,
            },
            'org_no': {
                required: true,
                maxlength: 100,
            },
            'printer_code': {
                required: true,
            },
            'address_1': {
                required: true,
            },
            'address_2': {
                required: true,
            },
            'zipcode': {
                required: true,
            },
            'city': {
                required: true,
            },
            'country': {
                required: true,
            },
            'building': {
                required: true,
            },
            'floor': {
                required: true,
            }
            ,'room': {
                required: true,
            },
            'email': {
                required: true,
            },
/*            'attachment': {
                required: true,
            },*/
            'tel_number': {
                required: true,
            },
            'qty_meeting_room': {
                required: true,
            },
            'mobile': {
                required: true,
            },

        },

        messages: {
            'name': {
                required: "Please enter the service name !",
            }
        }
    });

    /**
     ** When Building changes, floors automatically updated
     **/
    $('#building').on('change', function(){
        var getBuildingId = $('#building').val();

        $.ajax({
            url: '{{ route("company.companyFloorRooms.lists") }}',
            data: {building_id: getBuildingId},
            dataType: 'json',
            cache: false,
            type: 'POST', // For jQuery < 1.9
            success: function (data) {
                if (data.success == 1) {
                    var option = "";

                    $.each(data.floors, function (i, item) {
                        option += '<option value="' + item.id + '">' + item.floor + '</option>';
                    });

                    $('#floor').html(option);
                }
            },
            error: function (xhr, status, error) {

            }
        });
    });

    /**
     ** When Building & Floor changes, rooms automatically updated
     **/
    $('#floor').on('change', function(){
        var getFloorId = $('#floor').val();

        $.ajax({
            url: '{{ route("company.rooms.lists") }}',
            data: {floor_id: getFloorId},
            dataType: 'json',
            cache: false,
            type: 'POST', // For jQuery < 1.9
            success: function (data) {
                console.log(data);
                if (data.success == 1) {
                    var option = "";

                    $.each(data.rooms, function (i, item) {
                        option += '<option value="' + item.id + '">' + item.name + '</option>';
                    });

                    $('#room').html(option);
                }
            },
            error: function (xhr, status, error) {

            }

        });
    });

    $('#customer_submit').on('click', function(e) {
        e.preventDefault();

       if($('#customer_form').validate().form()) {
           var myform = document.getElementById("customer_form");
           var data = new FormData(myform);

           //Handle checkbox...
           if ($('#block_customer').is(':checked')) {
               data.append('block_customer', 1);
           }

           data.append('company_id', company_id);
           if(customer_id < 1) {
               $.ajax({
                   url: '{{ route("company.rcustomer.store") }}',
                   data: data,
                   cache: false,
                   contentType: false,
                   processData: false,
                   type: 'POST', // For jQuery < 1.9
                   success: function (data) {
                       console.log(data);
                       if(data.success) {
                           customer_id = data.customer.id;
                           customer_address_1 = data.customer.address_1;
                           customer_address_2 = data.customer.address_2;
                           customer_zipcode = data.customer.zipcode;
                           customer_city = data.customer.city;
                           customer_country = data.customer.country;
                       }
                   },
                   error: function (xhr, status, error) {
                       console.log(error);
                   }

               });
           }else {
               <?php
               $updateRoute = '';
               if (isset($customer)) {
                   $updateRoute = route("company.rcustomer.update", [$customer->id]);
               }
               ?>

               $.ajax({
                   url: '{{ $updateRoute }}',
                   data: data,
                   cache: false,
                   contentType: false,
                   processData: false,
                   type: 'POST', // For jQuery < 1.9
                   success: function (data) {

                   },
                   error: function (xhr, status, error) {

                   }

               });
           }
       }
    });

</script>