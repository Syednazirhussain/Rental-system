@extends('customers.default')

@section('content')
    <div class="container" style="margin-top: 50px; padding-bottom: 50px;">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 style="color: #4e4e56">HignNox Rooms For Rent</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="col-md-12">
                    <div class="search-box">
                        <div class="search-header">
                            <h4 class="text-center">Serarch Filter</h4>
                        </div>
                        <div class="search-content">
                            <div class="form-group">
                                <label for="buliding_name">Building Name</label>
                                <input type="text" class="form-control" id="buliding_name">
                            </div>
                            <div class="form-group">
                                <label for="buliding_name">Room Name</label>
                                <input type="text" class="form-control" id="buliding_name">
                            </div>
                            <div class="form-group">
                                <label for="buliding_name">Area</label>
                                <input type="text" class="form-control" id="buliding_name">
                            </div>
                            <div class="form-group">
                                <label for="buliding_name">Price</label>
                                <input type="text" class="form-control" id="buliding_name">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <li class="productLineTabItem productLineTabItem--active">
                    <span>
                        <span id="allTabItem" class="productLineTabItem-icon">
                            <i class="fa fa-sun-o"></i>
                        </span>
                        <span class="productLineTabItem-name">All</span>
                        <span class="productLineTabItem-baseline">All our rooms</span>
                    </span>
                </li>
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
            document.location.href = "/rooms/" + id;
        }
    </script>
@endsection