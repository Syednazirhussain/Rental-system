@extends('company.default')

@section('content')

     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Packages / </span>Add Package</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Add Package</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('company.conference.packages.store') }}" method="POST" id="">
                    

                            @include('company.Conference.packages.fields')

                    
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
        $(function() {
          $('.select2-example').select2({
            placeholder: 'Select value',
          });
        });


    </script>


    @endsection


@endsection
