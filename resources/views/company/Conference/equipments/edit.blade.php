@extends('company.default')

@section('content')

     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Equipments / </span>Edit Equipment</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Edit Equipment</div>
                    </div>
                    <div class="panel-body">
                   {!! Form::model($equipments, ['route' => ['company.conference.equipments.update', $equipments->id], 'method' => 'patch']) !!}

                        @include('company.Conference.equipments.fields')

                   {!! Form::close() !!}
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
