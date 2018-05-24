<input name="_token" type="hidden" value="{{ csrf_token() }}">
@if(isset($rcustomer))
    <input name="_method" type="hidden" value="PATCH">
@endif

<legend>Create New Customer</legend>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-3 form-group">
            <label for="id" class="control-label">ID </label>
            <input class="form-control" name="id" type="text" id="id">
        </div>
        <div class="col-md-3 form-group">
            <label for="number" class="control-label">Number </label>
            <input class="form-control" name="number" type="text" id="number">
        </div>
        <div class="col-md-6 form-group">
            <label for="door_code" class="control-label">Door Code </label>
            <input class="form-control" name="door_code" type="text" id="door_code">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="name" class="control-label">Name </label>
            <input class="form-control" name="name" type="text" id="name">
        </div>
        <div class="col-md-6 form-group">
            <label for="printer_code" class="control-label">Printer Code </label>
            <input class="form-control" name="printer_code" type="text" id="printer_code">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="address_1" class="control-label">Address 1 </label>
            <input class="form-control" name="address_1" type="text" id="address_1">
        </div>
        <div class="col-md-6 form-group">
            <label for="building" class="control-label">Building </label>
            <input class="form-control" name="building" type="text" id="building">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="address_2" class="control-label">Address 2 </label>
            <input class="form-control" name="address_2" type="text" id="address_2">
        </div>
        <div class="col-md-6 form-group">
            <label for="floor" class="control-label">Floor </label>
            <input class="form-control" name="floor" type="text" id="floor">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-3 form-group">
            <label for="zipcode" class="control-label">Zip Code </label>
            <input class="form-control" name="zipcode" type="text" id="zipcode">
        </div>
        <div class="col-md-3 form-group">
            <label for="city" class="control-label">City </label>
            <input class="form-control" name="city" type="text" id="city">
        </div>
        <div class="col-md-6 form-group">
            <label for="room_no" class="control-label">Room Number </label>
            <input class="form-control" name="room_no" type="text" id="room_no">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="country" class="control-label">Country </label>
            <input class="form-control" name="country" type="text" id="country">
        </div>
        <div class="col-md-6 form-group">
            <label for="category" class="control-label">Category </label>
            <input class="form-control" name="category" type="text" id="category">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="email" class="control-label">Email </label>
            <input class="form-control" name="email" type="text" id="email">
        </div>
        <div class="col-md-6 form-group">
            <label for="attachment" class="control-label">File Attachment </label>
            <input class="form-control" name="attachment" type="file" id="attachment">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="tel_number" class="control-label">Tel Number </label>
            <input class="form-control" name="tel_number" type="text" id="tel_number">
        </div>
        <div class="col-md-6 form-group">
            <label for="qty_meeting_rooms" class="control-label">QTY of Free Meeting Rooms </label>
            <input class="form-control" name="qty_meeting_rooms" type="text" id="qty_meeting_rooms">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="mobile" class="control-label">Mobile </label>
            <input class="form-control" name="mobile" type="text" id="mobile">
        </div>
        <div class="col-md-6 form-group">
            <label for=""></label>
            <label class="custom-control custom-checkbox">
                <input type="checkbox" name="block_customer" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                Block Customer
            </label>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="language" class="control-label">Communication Language</label>
            <input class="form-control" name="language" type="text" id="language">
        </div>
        <div class="col-md-6 form-group">
            <label for="blocked_by" class="control-label">Blocked By</label>
            <input class="form-control" name="blocked_by" type="text" id="blocked_by">
        </div>
    </div>

    <br>
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-10 text-right">
                <input class="btn btn-primary" type="submit" value="Submit">
                <a href="{{ route('company.rcustomer.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
</div>