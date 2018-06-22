@extends('company.default')

@section('content')

     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Conference / Room Layouts / </span>Edit "{{$roomLayout->title}}"</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Edit "{{$roomLayout->title}}"</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{route('company.conference.roomLayouts.update', $roomLayout->id)}}" method="POST" id="roomlayoutForm" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PATCH">

                            @include('company.Conference.room_layouts.fields')

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
