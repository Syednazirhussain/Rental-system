@extends('company.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light">
                    <i class="page-header-icon ion-android-checkbox-outline"></i>
                    <a href="{{ route('company.roomImages.index') }}">Room Images</a> /
                </span>
                Edit Room Images
            </h1>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Edit Room Images</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('company.roomImages.update', [$roomImages->id]) }}" method="POST" id="roomImagesForm" enctype="multipart/form-data">

                            @include('company.room_images.fields')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
