@extends('company.default')


@section('css')


@endsection

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Settings / </span>Add Room</h1>
        </div>
        <div class="row">

            <div class="container">
                <ul class="nav nav-pills nav-stacked col-md-2">
                  <li class="active"><a href="#tab_a" data-toggle="pill">General Info</a></li>
                  <li><a href="#tab_b" data-toggle="pill">Conference</a></li>
                  <li><a href="#tab_c" data-toggle="pill">Rental</a></li>
<!--                   <li><a href="#tab_d" data-toggle="pill">Pill D</a></li> -->
                </ul>
                <div class="tab-content col-md-10">
                    <div class="tab-pane active" id="tab_a">
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="panel-title">Add Room</div>
                            </div>
                            <div class="panel-body">
                                <form action="{{ route('company.rooms.store') }}" method="POST" id="roomForm" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    @if(isset($room))
                                        <input name="_method" type="hidden" value="PATCH">
                                    @endif
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <label for="company_id">Company Name</label>
                                            <input type="text" id="company_id" class="form-control"
                                                   value="@if(isset($company)){{ $company->name }}@endif" disabled>
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label for="select_floor">Floor Name</label>
                                            <select class="form-control" id="select_floor" name="floor_id">
                                                @if(isset($room))<option value="{{ $room->floor_id }}">{{ $floor_name }}</option>@endif
                                                @foreach ($companyFloors as $floor)
                                                    <option value="{{ $floor->id }}"><span>{{ $companyBuildings[$floor->building_id] }}</span> - Floor {{$floor->floor }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label for="service_id">Select Service</label>
                                            <select class="form-control" id="service_id" name="service_id">
                                                @if(isset($room))<option value="{{ $room->service_id }}">{{ $service_name }}</option>@endif
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}">{{$service->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label for="room_name">Room Name</label>
                                            <input type="text" id="room_name" name="name" class="form-control" value="@if(isset($room)){{ $room->name }}@endif">
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label for="room_area">Area</label>
                                            <input type="number" id="room_area" name="area" class="form-control" value="@if(isset($room)){{ $room->area }}@endif">
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label for="room_price">Price</label>
                                            <input type="number" id="room_price" name="price" class="form-control" value="@if(isset($room)){{ $room->price }}@endif">
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label for="security_code">Security Code</label>
                                            <input type="text" id="security_code" name="security_code" class="form-control" value="@if(isset($room)){{ $room->security_code }}@endif">
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label for="sort_index">Sort Index</label>
                                            <input type="text" id="sort_index" name="sort_index" class="form-control">
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label for="article_number">Article Number</label>
                                            <input type="text" id="article_number" name="article_number" class="form-control">
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label for="public_name">Public Name</label>
                                            <input type="text" id="public_name" name="public_name" class="form-control">
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label for="SQNA">SQNA</label>
                                            <input type="text" id="SQNA" name="SQNA" class="form-control" value="@if(isset($room)){{ $room->security_code }}@endif">
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label for="building_id">Building</label>
                                            <select class="form-control" id="building_id" name="building_id">
                                                <option value=""></option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label for="start_date">Start Date</label>
                                            <input type="date" id="start_date" name="start_date" class="form-control">
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label for="end_date">End Date</label>
                                            <input type="date" id="end_date" name="end_date" class="form-control">
                                        </div>

                                        <div class="col-sm-12 form-group">
                                            <label for="end_date_continue">End Date Continue<input type="checkbox" id="end_date_continue" name="end_date_continue" class="form-control">
                                            </label>
                                        </div>
                                        
                                        <div class="col-sm-12 form-group">
                                            <label for="image1">Image 1</label>
                                            <input type="file" id="image1" name="image1" style="@if(isset($room)) @if($room->image1 !== '') display:none  @endif @endif">
                                            @if(isset($room))
                                                @if($room->image1 !== '')
                                                    <div class="col-sm-12" id="div_image1">
                                                        <img src="{{ asset('uploadedimages/'.$room->image1) }}" style="width:200px">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <button class="btn btn-link" id="edit_image1" onclick="editImage(1)">Edit</button>
                                                        <button class="btn btn-link" id="cancel_image1" onclick="cancelImage(1)" style="display:none">Cancel</button>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label for="image2">Image 2</label>
                                            <input type="file" id="image2" name="image2" style="@if(isset($room)) @if($room->image2 !== '') display:none  @endif @endif">
                                            @if(isset($room))
                                                @if($room->image2 !== '')
                                                    <div class="col-sm-12" id="div_image2">
                                                        <img src="{{ asset('uploadedimages/'.$room->image2) }}" style="width:200px">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <button class="btn btn-link" id="edit_image2" onclick="editImage(2)">Edit</button>
                                                        <button class="btn btn-link" id="cancel_image2" onclick="cancelImage(2)" style="display:none">Cancel</button>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label for="image3">Image 3</label>
                                            <input type="file" id="image3" name="image3" style="@if(isset($room)) @if($room->image3 !== '') display:none  @endif @endif">
                                            @if(isset($room))
                                                @if($room->image3 !== '')
                                                    <div class="col-sm-12" id="div_image3">
                                                        <img src="{{ asset('uploadedimages/'.$room->image3) }}" style="width:200px">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <button class="btn btn-link" id="edit_image3" onclick="editImage(3)">Edit</button>
                                                        <button class="btn btn-link" id="cancel_image3" onclick="cancelImage(3)" style="display:none">Cancel</button>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label for="image4">Image 4</label>
                                            <input type="file" id="image4" name="image4" style="@if(isset($room)) @if($room->image4 !== '') display:none  @endif @endif">
                                            @if(isset($room))
                                                @if($room->image4 !== '')
                                                    <div class="col-sm-12" id="div_image4">
                                                        <img src="{{ asset('uploadedimages/'.$room->image4) }}" style="width:200px">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <button class="btn btn-link" id="edit_image4" onclick="editImage(4)">Edit</button>
                                                        <button class="btn btn-link" id="cancel_image4" onclick="cancelImage(4)" style="display:none">Cancel</button>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label for="image5">Image 5</label>
                                            <input type="file" id="image5" name="image5" style="@if(isset($room)) @if($room->image5 !== '') display:none  @endif @endif">
                                            @if(isset($room))
                                                @if($room->image5 !== '')
                                                    <div class="col-sm-12" id="div_image5">
                                                        <img src="{{ asset('uploadedimages/'.$room->image5) }}" style="width:200px">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <button class="btn btn-link" id="edit_image5" onclick="editImage(5)">Edit</button>
                                                        <button class="btn btn-link" id="cancel_image5" onclick="cancelImage(5)" style="display:none">Cancel</button>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary">@if(isset($room)) <i class="fa fa-refresh"></i>  Update Room @else <i class="fa fa-plus"></i>  Add Room @endif</button>
                                            <a href="{!! route('company.rooms.index') !!}" class="btn btn-default">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_b">
                         <h4>Conference</h4>
                    </div>
                    <div class="tab-pane" id="tab_c">
                         <h4>Rental</h4>
                    </div>
<!--                     <div class="tab-pane" id="tab_d">
                         <h4>Pane D</h4>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                    </div> -->
                </div>
            </div>

        </div>
    </div>
@endsection


@section('js')


@endsection