<script type="text/javascript">
    //Global Value
    var customer_id = '';
    var contact_id = '';
    var invoice_id = '';
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

    var company_id = document.getElementById('company_id').value;

    $('#customer_submit').on('click', function(e) {
        $('#customer_form').validate();
        e.preventDefault();

       if($('#customer_form').validate().form()) {
           var myform = document.getElementById("customer_form");
           var data = new FormData(myform);

           //Handle checkbox...
           if ($('#block_customer').is(':checked')) {
               data.append('block_customer', 1);
           }

           data.append('company_id', company_id);

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
                   }
               },
               error: function (xhr, status, error) {
                   console.log(error);
               }

           });
       }
    });

</script>