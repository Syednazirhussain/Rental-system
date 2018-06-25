@extends('company.default')

@section('content')

     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon fa fa-edit"></i>Conference / Food &amp; Drinks / </span>Edit "{{$food->title}}"</h1>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Edit "{{$food->title}}"</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('company.conference.foods.update', $food->id) }}" method="POST" id="foodForm">
                           <input name="_method" type="hidden" value="PATCH">
                            @include('company.Conference.foods.fields')


                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @section('js')


    <script>

        // -------------------------------------------------------------------------
        // Initialize Select2

        $(function() {
          $('.select2-example').select2({
            placeholder: 'Select value',
          });
        });

    </script>


    @endsection


@endsection
