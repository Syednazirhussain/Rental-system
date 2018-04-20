@extends('customers.default')

@section('content')
<div class="container" style="margin-top: 50px; padding-bottom: 50px;">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Available Rooms</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="col-md-12">
                <h3>Company Buildings</h3>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <h3>Rooms</h3>
            </div>
            @foreach($rooms as $room)
            <li class="resultItem" onclick="goToRoom({{ $room->room_id }})">
                @include('customers.home.fields')
            </li>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        function goToRoom(id) {
            document.location.href= "/rooms/" + id;
        }
    </script>
@endsection