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

    var company_id = document.getElementById('company_id').value;

    $('#contact_submit').on('click', function(e) {
        $('#customer_form').validate();
        e.preventDefault();

       if($('#contact_form').validate().form()) {
           var myform = document.getElementById("contact_form");
           var data = new FormData(myform);
           data.append('company_id', company_id);
           data.append('customer_id', customer_id);

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
    });

</script>