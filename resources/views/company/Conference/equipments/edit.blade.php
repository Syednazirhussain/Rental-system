@extends('company.default')

@section('content')

     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Buildings / Rooms / Room Equipments / Equipments / </span>Edit {{$equipments->title}}</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Edit {{$equipments->title}}</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('company.conference.equipments.update', $equipments->id) }}" method="Post" id="equipmentForm">
                            <input type="hidden" name="_method" value="PATCH">

                            @include('company.Conference.equipments.fields')

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
