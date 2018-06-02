@extends('company.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i><a href="{{ route('company.roomNotes.index') }}">Room Notes</a> / </span>Add Room Notes</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Add Room Notes</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('company.roomNotes.store') }}" method="POST" id="roomNotesForm" enctype="multipart/form-data">

                            @include('company.room_notes.fields')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

