<input name="_token" type="hidden" value="{{ csrf_token() }}">
@if(isset($customer))
    <input name="_method" type="hidden" value="PATCH">
@endif

<legend>Create New Customer</legend>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="number" class="col-md-5 form-label">Customer No</label>
            <div class="col-md-7">
                <input class="form-control" name="number" type="text" id="number" value="@if(isset($customer)){{ $customer->number }}@endif">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="org_no" class="col-md-5 form-label">Organization Number</label>
            <div class="col-md-7">
                <input class="form-control" name="org_no" type="text" id="org_no" value="@if(isset($customer)){{ $customer->org_no }}@endif">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="name" class="col-md-5 form-label">Name </label>
            <div class="col-md-7">
                <input class="form-control" name="name" type="text" id="name" value="@if(isset($customer)){{ $customer->name }}@endif">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="printer_code" class="col-md-5 form-label">Printer Code </label>
            <div class="col-md-7">
                <input class="form-control" name="printer_code" type="text" id="printer_code" value="@if(isset($customer)){{ $customer->printer_code }}@endif">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="address_1" class="col-md-5 form-label">Address 1 </label>
            <div class="col-md-7">
                <input class="form-control" name="address_1" type="text" id="address_1" value="@if(isset($customer)){{ $customer->address_1 }}@endif">
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
                <input class="form-control" name="address_2" type="text" id="address_2" value="@if(isset($customer)){{ $customer->address_2 }}@endif">
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
                <input class="form-control" name="zipcode" type="text" id="zipcode" value="@if(isset($customer)){{ $customer->zipcode }}@endif">
            </div>
        </div>
        <div class="col-md-3 form-group">
            <label for="city" class="col-md-5 form-label">City </label>
            <div class="col-md-7">
                <input class="form-control" name="city" type="text" id="city" value="@if(isset($customer)){{ $customer->city }}@endif">
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
                <input class="form-control" name="country" type="text" id="country" value="@if(isset($customer)){{ $customer->country }}@endif">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="category" class="col-md-5 form-label">Category </label>
            <div class="col-md-7">
                <input class="form-control" name="category" type="text" id="category" value="@if(isset($customer)){{ $customer->category }}@endif">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="email" class="col-md-5 form-label">Email </label>
            <div class="col-md-7">
                <input class="form-control" name="email" type="text" id="email" value="@if(isset($customer)){{ $customer->email }}@endif">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="attachment" class="col-md-5 form-label">File Attachment </label>
            <div class="col-md-7">
                <input class="form-control" name="attachment" type="file" id="attachment" value="@if(isset($customer)){{ $customer->attachment }}@endif">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="tel_number" class="col-md-5 form-label">Tel Number </label>
            <div class="col-md-7">
                <input class="form-control" name="tel_number" type="number" id="tel_number" value="@if(isset($customer)){{ $customer->tel_number }}@endif">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="qty_meeting_room" class="col-md-5 form-label">QTY of Free Meeting Rooms </label>
            <div class="col-md-7">
                <input class="form-control" name="qty_meeting_room" type="number" id="qty_meeting_room" value="@if(isset($customer)){{ $customer->qty_meeting_room }}@endif">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="mobile" class="col-md-5 form-label">Mobile </label>
            <div class="col-md-7">
                <input class="form-control" name="mobile" type="number" id="mobile" value="@if(isset($customer)){{ $customer->mobile }}@endif">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for=""></label>
            <label class="custom-control custom-checkbox">
                <input type="checkbox" id="block_customer" data-toggle="switch" class="custom-control-input" value="@if(isset($customer))checked @endif">
                <span class="custom-control-indicator"></span>
                Block Customer
            </label>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="language" class="col-md-5 form-label">Communication Language</label>
            <div class="col-md-7">
                <input class="form-control" name="language" type="text" id="language" value="@if(isset($customer)){{ $customer->language }}@endif">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="blocked_by" class="col-md-5 form-label">Blocked By</label>
            <div class="col-md-7">
                <input class="form-control" name="blocked_by" type="text" id="blocked_by" value="@if(isset($customer)){{ $customer->blocked_by }}@endif">
            </div>
        </div>
    </div>

    <br>
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-10 text-right">
                <input class="btn btn-primary" type="submit" value="@if(isset($customer)) Update @else Save @endif" id="customer_submit">
                <a href="{{ route('company.rcustomer.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
</div>