@extends('company.default')

@section('content')

     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Equipments / </span>Add Equipment</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Add Equipment</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('company.conference.equipments.store') }}" method="POST" id="equipmentForm">

                            @include('company.Conference.equipments.fields')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


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


