@extends('admin.default')

@section('content')



        <div class="px-content">
            <div class="page-header">
                <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Settings / </span>Admin General Settings</h1>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    @if(Session::has('GeneralSettingError'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('GeneralSettingError') }}
                        </div>
                    @endif
                    <div class="panel">
                        <form action="{{ route('admin.userStatuses.addOrUpdate') }}" method="POST">
                            <div class="panel-heading">
                                <div class="panel-title">General Information</div>
                            </div>
                            <div class="panel-body">
                                    @include('admin.admin_general.general')
                            </div>
                            <div class="panel-heading">
                                <div class="panel-title">Tax &amp; Invoice validition</div>
                            </div>
                            <div class="panel-body">
                                    @include('admin.admin_general.tax')
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


@endsection

@section('js')

<script type="text/javascript">



    $('document').ready(function() {
        var cityId = $('.city').attr('id');
        var stateId = $('.state').attr('id');
        
          $.ajax({
              url: "{{ route('admin.settings.general') }}",
              type: 'GET',
              success: function(response){
                console.log($data);
              }
          });
    });
    
      $('#State').on('change', function() {

          var getStateId = $('#State').val();

          $.ajax({
              url: '{{ route("cities.list") }}',
              data: { state_id: getStateId },
              dataType: 'json',
              cache: false,
              type: 'POST',
              success: function(data){
                  if (data.success == 1) {
                    var option = "";
                    $.each(data.cities, function(i, item) {
                        option += '<option data-state="'+item.state_id+'" value="'+item.id+'">'+item.name+'</option>';
                    });
                    $('#city_id').html(option);
                  }
              },
              error: function(xhr,status,error)  {

              }
          });
      }); 

      
      // Initialize validator
      $('#userStatusForm').pxValidate({
        focusInvalid: false,
        rules: {
          'name': {
            required: true,
            maxlength: 50,
          },
        },

        messages: {
          'name': {
            required: "Please enter the name",
          }
        }

      });





              $(function() {
                $('#Country').select2({
                  placeholder: 'Select Country',
                });
              });

              $(function() {
                $('#State').select2({
                  placeholder: 'Select State',
                });
              });

              $(function() {
                $('#city_id').select2({
                  placeholder: 'Select City',
                });
              });
</script>

@endsection
