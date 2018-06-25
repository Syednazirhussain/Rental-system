<script type="text/javascript">
    //Global Value
    var company_id = "{{ isset($contract) ? $company_id: 0 }}";
    var contract_id = "{{ isset($contract) ? $contract->id: 0 }}";
    var termination_id = "{{ isset($termination) ? $termination->id: 0 }}";
    var lord_termination_id = "{{ isset($lord_termination) ? $lord_termination->id: 0 }}";

    /**
     * jQuery Validation for all fields
     **/
    // Initialize validator
    $('#rental_agreement').pxValidate({
        focusInvalid: false,
        rules: {
            'contract_id': {
                required: true,
                minlength: 3,
                maxlength: 100,
            },
            'org_no': {
                required: true,
                maxlength: 100,
            },
            'start_date': {
                required: true,
            },
            'end_date': {
                required: true,
            },
            'payment_method': {
                required: true,
            },
            'payment_cycle': {
                required: true,
            },
            'discount': {
                required: true,
            },
            'nr_termination': {
                required: true,
            },
            'nr_landlord': {
                required: true,
            },
            'monthly_rent': {
                required: true,
            },
            'note': {
                required: true,
            },
        }
    });

    // Initialize validator for Termination
    $('#contract_termination').pxValidate({
        focusInvalid: false,
        rules: {
            'termination_date': {
                required: true,
            },
            'termination_issue': {
                required: true,
                maxlength: 100,
            },
            'contract_end_date': {
                required: true,
            },
            'immigrant_date': {
                required: true,
            },
            'room_can_rented_date': {
                required: true,
            },
            'note': {
                required: true,
            },
            'loard_termination_date': {
                required: true,
            },
            'loard_termination_issue': {
                required: true,
            },
            'loard_contract_end_date': {
                required: true,
            },
            'loard_note': {
                required: true,
            }
        }
    });

    /**
     ** When Building changes, floors automatically updated
     **/
    $('#building_id').on('change', function(){
        var getBuildingId = $('#building_id').val();

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

                    $('#floor_id').html(option);
                }
            },
            error: function (xhr, status, error) {

            }
        });
    });

    /**
     ** When Building & Floor changes, rooms automatically updated
     **/
    $('#floor_id').on('change', function(){
        var getFloorId = $('#floor_id').val();

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

                    $('#room_id').html(option);
                }
            },
            error: function (xhr, status, error) {

            }

        });
    });

    $('#submit_contract').on('click', function(e) {
        e.preventDefault();

       if($('#rental_agreement').validate().form()) {
           var myform = document.getElementById("rental_agreement");
           var data = new FormData(myform);

           //Handle checkbox...
           if ($('#continues').is(':checked')) {
               data.append('continues', 1);
           }

           data.append('company_id', company_id);
           if(contract_id < 1) {
               $.ajax({
                   url: '{{ route("company.contracts.store") }}',
                   data: data,
                   cache: false,
                   contentType: false,
                   processData: false,
                   type: 'POST', // For jQuery < 1.9
                   success: function (data) {
                       console.log(data);
                       if(data.success) {
                           contract_id = data.room_contract_id;
                       }
                   },
                   error: function (xhr, status, error) {
                       console.log(error);
                   }
               });
           }else {
               <?php
               $updateRoute = '';
               if (isset($contract)) {
                   $updateRoute = route("company.contracts.update", [$contract->id]);
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

    $('#submit_termination').on('click', function(e) {
        e.preventDefault();

        if($('#contract_termination').validate().form()) {
            var myform = document.getElementById("contract_termination");
            var data = new FormData(myform);

            data.append('company_id', company_id);
            data.append('contract_id', contract_id);
            if(termination_id < 1 && lord_termination_id < 1) {
                $.ajax({
                    url: '{{ route("company.contracts.save_termination") }}',
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST', // For jQuery < 1.9
                    success: function (data) {
                        console.log(data);
                        if(data.success) {
                            termination_id = data.termination.termination_id;
                            lord_termination_id = data.termination.lord_termination_id;
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    }
                });
            }else {
                <?php
                $updateRoute = '';
                if (isset($contract)) {
                    $updateRoute = route("company.contracts.update_termination", [$contract->id]);
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
                        if(data.success) {
                        }
                    },
                    error: function (xhr, status, error) {

                    }

                });
            }
        }
    });

</script>