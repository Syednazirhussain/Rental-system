<input name="_token" type="hidden" value="{{ csrf_token() }}">
@if(isset($rcustomer))
    <input name="_method" type="hidden" value="PATCH">
@endif

<legend>Create New Customer</legend>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="number" class="col-md-5 form-label">Customer No</label>
            <div class="col-md-7">
                <input class="form-control" name="number" type="text" id="number">
                <input class="hidden" name="company_id" type="text" id="company_id" value={{ $company_id }}>
                <input class="hidden" name="customer_id" type="text" id="customer_id" value="@if(isset($customer)){{ $customer->id }}@endif">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="org_no" class="col-md-5 form-label">Organization Number</label>
            <div class="col-md-7">
                <input class="form-control" name="org_no" type="number" id="org_no">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="name" class="col-md-5 form-label">Name </label>
            <div class="col-md-7">
                <input class="form-control" name="name" type="text" id="name">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="printer_code" class="col-md-5 form-label">Printer Code </label>
            <div class="col-md-7">
                <input class="form-control" name="printer_code" type="text" id="printer_code">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="address_1" class="col-md-5 form-label">Address 1 </label>
            <div class="col-md-7">
                <input class="form-control" name="address_1" type="text" id="address_1">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="building" class="col-md-5 form-label">Select Building </label>
            <div class="col-md-7">
                <select class="form-control" id="building" name="building">
                    @if(isset($customer))
                        <option value="{{ $customer->building }}">{{ $building_name }}</option>@endif
                    @foreach ($buildings as $building)
                        <option value="{{ $building->id }}"><span>{{ $building->name }}</span></option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="address_2" class="col-md-5 form-label">Address 2 </label>
            <div class="col-md-7">
                <input class="form-control" name="address_2" type="text" id="address_2">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="floor" class="col-md-5 form-label">Select Floor </label>
            <div class="col-md-7">
                <select class="form-control" id="floor" name="floor">
                    @if(isset($customer))
                        <option value="{{ $customer->floor }}">{{ $floor_name }}</option>@endif
                    @foreach ($floors as $floor)
                        <option value="{{ $floor->id }}"><span>{{ $floor->floor }}</span></option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-3 form-group">
            <label for="zipcode" class="col-md-5 form-label">Zip Code </label>
            <div class="col-md-7">
                <input class="form-control" name="zipcode" type="text" id="zipcode">
            </div>
        </div>
        <div class="col-md-3 form-group">
            <label for="city" class="col-md-5 form-label">City </label>
            <div class="col-md-7">
                <input class="form-control" name="city" type="text" id="city">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="room" class="col-md-5 form-label">Select Room </label>
            <div class="col-md-7">
                <select class="form-control" id="room" name="room">
                    @if(isset($customer))
                        <option value="{{ $customer->room }}">{{ $room_name }}</option>@endif
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}"><span>{{ $room->name }}</span></option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="country" class="col-md-5 form-label">Country </label>
            <div class="col-md-7">
                <input class="form-control" name="country" type="text" id="country">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="category" class="col-md-5 form-label">Category </label>
            <div class="col-md-7">
                <input class="form-control" name="category" type="text" id="category">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="email" class="col-md-5 form-label">Email </label>
            <div class="col-md-7">
                <input class="form-control" name="email" type="text" id="email">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="attachment" class="col-md-5 form-label">File Attachment </label>
            <div class="col-md-7">
                <input class="form-control" name="attachment" type="file" id="attachment">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="tel_number" class="col-md-5 form-label">Tel Number </label>
            <div class="col-md-7">
                <input class="form-control" name="tel_number" type="number" id="tel_number">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="qty_meeting_room" class="col-md-5 form-label">QTY of Free Meeting Rooms </label>
            <div class="col-md-7">
                <input class="form-control" name="qty_meeting_room" type="number" id="qty_meeting_room">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="mobile" class="col-md-5 form-label">Mobile </label>
            <div class="col-md-7">
                <input class="form-control" name="mobile" type="number" id="mobile">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for=""></label>
            <label class="custom-control custom-checkbox">
                <input type="checkbox" id="block_customer" data-toggle="switch" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                Block Customer
            </label>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="language" class="col-md-5 form-label">Communication Language</label>
            <div class="col-md-7">
                <input class="form-control" name="language" type="text" id="language">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="blocked_by" class="col-md-5 form-label">Blocked By</label>
            <div class="col-md-7">
                <input class="form-control" name="blocked_by" type="text" id="blocked_by">
            </div>
        </div>
    </div>

    <br>
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-10 text-right">
                <input class="btn btn-primary" type="submit" value="Save" id="customer_submit">
                <a href="{{ route('company.rcustomer.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
</div>