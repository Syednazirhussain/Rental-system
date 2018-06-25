@extends('company.default')

@section('content')

     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon fa fa-plus"></i>Conference / Room Layouts / </span>Create Room Layout</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Create Room Layout</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('company.conference.roomLayouts.store') }}" method="POST" id="roomlayoutForm" enctype="multipart/form-data">

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
