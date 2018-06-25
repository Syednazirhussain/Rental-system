@extends('company.default')

@section('content')

     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon fa fa-plus"></i>Conference / Food &amp; Drinks / </span>Create Food &amp; Drink</h1>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Create Food &amp; Drink</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('company.conference.foods.store') }}" method="POST" id="foodForm">

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
