<script type="text/javascript">
    /**
     * jQuery Validation for all fields
     **/
    // Initialize validator
    $('#financial_form').pxValidate({
        focusInvalid: false,
        rules: {
            'acc_1': {
                required: true,
            },
            'acc_2': {
                required: true,
            },
            'acc_3': {
                required: true,
            },
            'acc_4': {
                required: true,
            },
            'article_no': {
                required: true,
            },
            'cost_no': {
                required: true,
            },
            'project_no': {
                required: true,
            },
        }
    });

    $('#financial_submit').on('click', function(e) {
        e.preventDefault();

       if($('#financial_form').validate().form()) {
           var myform = document.getElementById("financial_form");
           var data = new FormData(myform);
           data.append('company_id', company_id);
           data.append('article_id', article_id);

           if(financial_id > 0) {
               <?php
               $updateRoute = '';
               if (isset($financial)) {
                   $updateRoute = route("company.rfinancial.update", [$financial->id]);
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
                   url: '{{ route("company.rfinancial.store") }}',
                   data: data,
                   cache: false,
                   contentType: false,
                   processData: false,
                   type: 'POST', // For jQuery < 1.9
                   success: function (data) {
                       console.log(data);
                       if(data.success) {
                           financial_id = data.financial.id;
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