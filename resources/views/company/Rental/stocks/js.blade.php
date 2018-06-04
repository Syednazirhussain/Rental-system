<script type="text/javascript">
    /**
     * jQuery Validation for all fields
     **/
    // Initialize validator
    $('#stock_form').pxValidate({
        focusInvalid: false,
        rules: {
            'qty': {
                required: true,
            },
            'value': {
                required: true,
            },
            'width': {
                required: true,
            },
            'height': {
                required: true,
            },
            'depth': {
                required: true,
            },
            'weight': {
                required: true,
            }
        }
    });

    $('#stock_submit').on('click', function(e) {
        e.preventDefault();

       if($('#stock_form').validate().form()) {
           var myform = document.getElementById("stock_form");
           var data = new FormData(myform);
           data.append('company_id', company_id);
           data.append('article_id', article_id);

           if(price_id > 0) {
               <?php
               $updateRoute = '';
               if (isset($invoice)) {
                   $updateRoute = route("company.rinvoice.update", [$invoice->id]);
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
           }else {
               $.ajax({
                   url: '{{ route("company.rstock.store") }}',
                   data: data,
                   cache: false,
                   contentType: false,
                   processData: false,
                   type: 'POST', // For jQuery < 1.9
                   success: function (data) {
                       console.log(data);
                       if(data.success) {
                           stock_id = data.stock.id;
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