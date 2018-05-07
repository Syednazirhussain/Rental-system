
<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($userRole))
	<input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">                           
	                                
	<div class="col-sm-12 form-group">
    	<label for="code">Code</label>
        <input type="text" name="code" id="code" class="form-control" value="@if(isset($userRole)){{$userRole->code}}@endif">
	</div>

  <input type="hidden" id="checkCode" value="@if(isset($userRole)){{$userRole->code}}@endif" >

	<div class="col-sm-12 form-group">
    	<label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="@if(isset($userRole)){{$userRole->name}}@endif">
	</div>

  <input type="hidden" name="permissions" id="per">

  <div class="col-sm-12 form-group">
      <label for="user_role_codes">Permission</label>
      <select class="form-control select2-example"  id="permissions" multiple>
          @foreach($permissions as $permission)
              <option value="{{$permission->id}}">{{$permission->name}}</option>
          @endforeach
      </select>
  </div>

	<div class="col-sm-12">
		<button type="submit" class="btn btn-primary">@if(isset($userRole)) <i class="fa fa-refresh"></i>  UPDATE @else <i class="fa fa-plus"></i> ADD USER ROLE @endif</button>
	    <a href="{!! route('admin.userRoles.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> CANCEL</a>
	</div>

</div>


@section('js')

  <script type="text/javascript">
      
      // Initialize validator
      $('#userRolesForm').pxValidate({
        focusInvalid: false,
        rules: {
          'code': {
            required: true,
            maxlength: 50,
            remote :{
              param : {
                url : "{{ route('admin.userRoles.checkCode') }}",
                type : "POST",
                dataType : "json",
                data : {
                  'code' : function(){
                    return $('#code').val();
                  }
                },
                dataFilter : function(response){
                  return checkField(response);
                }
              },
              depends : function(element){
                  return ( $(element).val() != $('#checkCode').val() );
              }
            }

          },
          'name': {
            required: true,
            maxlength: 100,
          },
          'per': {
            required: true
          },
        },

        messages: {
          'code': {
            required : "please enter code",
            remote : "The code you enter is already in use"
          },
          'name': {
            required: "please enter name",
          }
        }

      });

      $('#userRolesForm').on('submit', function(e) {

        var Permission =  $('#permissions').val();

        console.log(Permission);

        $('#per').val(Permission);

        return true;

      });


      // Initialize Select2
      $(function() {
        $('.select2-example').select2({
          placeholder: 'Select value',
        });
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

