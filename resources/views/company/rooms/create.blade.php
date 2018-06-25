@extends('company.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon fa fa-plus"></i><a href="{{route('company.rooms.index')}}">Rooms</a>  / </span>Create Room</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <br/>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="panel">

                    <form action="{{ route('company.rooms.store') }}" method="POST" id="roomForm" enctype="multipart/form-data">
                            @include('company.rooms.field')
                    </form>
                    
                </div>
            </div>
        </div>

    </div>
@endsection

