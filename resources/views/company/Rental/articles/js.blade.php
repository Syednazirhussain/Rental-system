<script type="text/javascript">
    //Global Value
    var article_id = "{{ isset($article) ? $article->id: 0 }}";
    var price_id = "{{ isset($price) ? $price->id: 0 }}";
    var stock_id = "{{ isset($stock) ? $stock->id: 0 }}";
    var financial_id = "{{ isset($financial) ? $financial->id: 0 }}";
    var company_id = "{{ isset($company_id) ? $company_id: 0 }}";
    /**
     * jQuery Validation for all fields
     **/
    // Initialize validator
    $('#article_form').pxValidate({
        focusInvalid: false,
        rules: {
            'module': {
                required: true,
            },
            'number': {
                required: true,
            },
            'building': {
                required: true,
            },
            'article_name_swedish': {
                required: true,
            },
            'article_name_english': {
                required: true,
            },
            'sales_price': {
                required: true,
            },
            'in_price': {
                required: true,
            },
            'unit': {
                required: true,
            },
            'suppliers': {
                required: true,
            },
            'start_date': {
                required: true,
            }
            ,'end_date': {
                required: true,
            }
            ,'category': {
                required: true,
            }
            ,'cancellation_condition': {
                required: true,
            }
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

    $('#article_submit').on('click', function(e) {
        e.preventDefault();

       if($('#article_form').validate().form()) {
           var myform = document.getElementById("article_form");
           var data = new FormData(myform);

           //Handle checkbox...
           /*if ($('#block_customer').is(':checked')) {
               data.append('block_customer', 1);
           }*/

           data.append('company_id', company_id);

           if(article_id < 1) {
               $.ajax({
                   url: '{{ route("company.rarticle.store") }}',
                   data: data,
                   cache: false,
                   contentType: false,
                   processData: false,
                   type: 'POST', // For jQuery < 1.9
                   success: function (data) {
                       console.log(data);
                       if(data.success) {
                           article_id = data.article.id;
                       }
                   },
                   error: function (xhr, status, error) {
                       console.log(error);
                   }

               });
           }else {
               <?php
               $updateRoute = '';
               if (isset($article)) {
                   $updateRoute = route("company.rarticle.update", [$article->id]);
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