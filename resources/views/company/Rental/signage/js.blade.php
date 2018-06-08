<script type="text/javascript">
    /**
     * jQuery Validation for all fields
     **/
    // Initialize validator
    $('#signage_form').pxValidate({
        focusInvalid: false,
        rules: {
            'first_name': {
                required: true,
            },
            'second_name': {
                required: true,
            },
            'third_name': {
                required: true,
            },
            'fourth_name': {
                required: true,
            }
        }
    });

    $('#signage_submit').on('click', function(e) {
        e.preventDefault();

       if($('#signage_form').validate().form()) {
           var myform = document.getElementById("signage_form");
           var data = new FormData(myform);
           data.append('company_id', company_id);
           data.append('customer_id', customer_id);

           if(signage_id > 0) {
               <?php
               $updateRoute = '';
               if (isset($signage)) {
                   $updateRoute = route("company.rsignage.update", [$signage->id]);
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
                           signage_id = data.signage.id;
                       }
                   },
                   error: function (xhr, status, error) {

                   }

               });

           }else {
               $.ajax({
                   url: '{{ route("company.rsignage.store") }}',
                   data: data,
                   cache: false,
                   contentType: false,
                   processData: false,
                   type: 'POST', // For jQuery < 1.9
                   success: function (data) {
                       console.log(data);
                       if(data.success) {
                           //document.getElementById('customer_id').value = data.customer.id;
                       }
                   },
                   error: function (xhr, status, error) {
                       console.log(error);
                   }

               });
           }
       }
    });

</script>