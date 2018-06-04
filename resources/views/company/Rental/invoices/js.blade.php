<script type="text/javascript">
    /**
     * jQuery Validation for all fields
     **/
    // Initialize validator
    $('#invoice_form').pxValidate({
        focusInvalid: false,
        rules: {
            'company_name': {
                required: true,
                minlength: 3,
                maxlength: 100,
            },
            'invoice_delivery': {
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
            'cost_number': {
                required: true,
            },
            'sale_discount': {
                required: true,
            },
        },

        messages: {
            'company_name': {
                required: "Please enter the Company name !",
            }
        }
    });

    var company_id = document.getElementById('company_id').value;

    $('#invoice_submit').on('click', function(e) {
        e.preventDefault();

       if($('#invoice_form').validate().form()) {
           var myform = document.getElementById("invoice_form");
           var data = new FormData(myform);
           data.append('company_id', company_id);
           data.append('customer_id', customer_id);

           $.ajax({
               url: '{{ route("company.rinvoice.store") }}',
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