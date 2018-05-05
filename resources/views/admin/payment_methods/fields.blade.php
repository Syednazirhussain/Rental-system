<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($paymentMethod))
    <input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">
    <div class="col-sm-12 form-group">
        <label for="user_full_name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="@if(isset($paymentMethod)){{ $paymentMethod->name }}@endif">
    </div>
    <div class="col-sm-12 form-group">
        <label for="user_email">Code</label>
        <input type="text" name="code" id="code" class="form-control" value="@if(isset($paymentMethod)){{ $paymentMethod->code }}@endif">
    </div>
    <input type="hidden" id="compareCode" value="@if(isset($paymentMethod)){{ $paymentMethod->code }}@endif">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">@if(isset($paymentMethod)) <i class="fa fa-refresh"></i>  Update @else <i class="fa fa-plus"></i> Add Payment Method @endif</button>
        <a href="{!! route('admin.paymentMethods.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
    </div>

</div>


@section('js')

    <script type="text/javascript">

        // Initialize validator
        $('#paymentForm').pxValidate({
            focusInvalid: false,
            rules: {
                'name': {
                    required: true
                },
                'code': {
                    required: true,
                    remote : {
                        param : {
                            url  : "{{ route('admin.paymentMethods.verifyCodeExist') }}",
                            type : "POST",
                            dataType : "json",
                            data : {
                                code : function(){
                                    return $('#code').val();
                                }
                            },
                            dataFilter : function(response){
                                return checkField(response);
                            }
                        },
                        depends : function(element){
                            return ( $(element).val() != $('#compareCode').val() );
                        }
                    }
                }
            },
            messages : {
                'code' : {
                    remote : "code already exists"
                }
            }

        });

        checkField = function(response) {
          switch ($.parseJSON(response).code) {
              case 200:
                  return "true"; // <-- the quotes are important!
              case 401:
                  //alert("Sorry, our system has detected that an account with this email address already exists.");
                  break;
              case 404:
                  console.log('missing code');
                  break;
              default:
                  alert("An undefined error occurred");
                  break;
          }
          return false;
        };


    </script>


@endsection
