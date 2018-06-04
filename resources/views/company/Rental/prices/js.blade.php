<script type="text/javascript">
    /**
     * jQuery Validation for all fields
     **/
    // Initialize validator
    $('#price_form').pxValidate({
        focusInvalid: false,
        rules: {
            'new_in_price': {
                required: true,
            },
            'new_from': {
                required: true,
            },
            'new_until': {
                required: true,
            },
            'sales_price': {
                required: true,
            },
            'sales_from': {
                required: true,
            },
            'sales_until': {
                required: true,
            }
        }
    });

    $('#price_submit').on('click', function (e) {
        e.preventDefault();

        if ($('#price_form').validate().form()) {
            var myform = document.getElementById("price_form");
            var data = new FormData(myform);
            data.append('company_id', company_id);
            data.append('article_id', article_id);
            if (price_id > 0) {
                <?php
                $updateRoute = '';
                if (isset($price)) {
                    $updateRoute = route("company.rprice.update", [$price->id]);
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
            } else {
                $.ajax({
                    url: '{{ route("company.rprice.store") }}',
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST', // For jQuery < 1.9
                    success: function (data) {
                        console.log(data);
                        if (data.success) {
                            price_id = data.price.id;
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