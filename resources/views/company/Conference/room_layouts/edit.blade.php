@extends('company.default')

@section('content')

     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Room Layouts / </span>Edit Room Layout</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Edit Room Layout</div>
                    </div>
                    <div class="panel-body">
                       {!! Form::model($roomLayout, ['route' => ['company.conference.roomLayouts.update', $roomLayout->id], 'method' => 'patch']) !!}

                            @include('company.Conference.room_layouts.fields')

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
