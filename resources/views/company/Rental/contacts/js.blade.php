<script type="text/javascript">
    /**
     * jQuery Validation for all fields
     **/
    // Initialize validator
    $('#contact_form').pxValidate({
        focusInvalid: false,
        rules: {
            'name': {
                required: true,
                minlength: 3,
                maxlength: 100,
            },
            'position_title': {
                required: true,
            },
            'tel_number': {
                required: true,
            },
            'mobile': {
                required: true,
            },
            'email': {
                required: true,
            },
            'busin_levage': {
                required: true,
            },
            'group': {
                required: true,
            },
        },

        messages: {
            'name': {
                required: "Please enter the name !",
            }
        }
    });

    $('#contact_submit').on('click', function(e) {
        e.preventDefault();

       if($('#contact_form').validate().form()) {
           var myform = document.getElementById("contact_form");
           var data = new FormData(myform);
           data.append('company_id', company_id);
           data.append('customer_id', customer_id);

           if(contact_id > 0) {
               <?php
               $updateRoute = '';
               if (isset($contact)) {
                   $updateRoute = route("company.rcontact.update", [$contact->id]);
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
                           contact_id = data.contact.id;
                       }
                   },
                   error: function (xhr, status, error) {

                   }

               });

           }else {
               $.ajax({
                   url: '{{ route("company.rcontact.store") }}',
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