<form action="{{ route('company.contracts.store') }}" accept-charset="UTF-8" id="rental_agreement">

    <input name="_token" type="hidden" value="{{ csrf_token() }}">
    @if(isset($contract))
        <input name="_method" type="hidden" value="PATCH">
    @endif

    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-6 form-group">
                <label for="number">Contract ID</label>
                <input type="text" name="number" id="number" class="form-control"
                       value="@if(isset($contract)){{ $contract->number }}@endif" />
                <div class="errorTxt"></div>
            </div>
            <div class="col-sm-6 form-group">
                <label for="contract-no">Contract Status</label>
                <select id="contract_status" name="status" class="form-control">
                    <option value="active">Active</option>
                    <option value="active">Active</option>
                </select>
                <div class="errorTxt"></div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-6 form-group">
                <label for="building_id">Select a Building</label>
                <select id="building_id" name="building_id" class="form-control">
                    @foreach($buildings as $building)
                        <option value="{{ $building->id }}">{{ $building->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6 form-group">
                <label for="floor_id">Select a Floor</label>
                <select id="floor_id" name="floor_id" class="form-control">
                    @foreach($floors as $floor)
                        <option value="{{ $floor->id }}">{{ $floor->floor }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-6 form-group">
                <label for="contract-no">Select a Room</label>
                <select id="room_id" name="room_id" class="form-control">
                    @foreach($rooms as $room)
                        @if ((isset($contract)) && $room->id == $contract->room_id)
                            <option value="{{ $room->id }}"
                                    selected="selected">{{ $room->name }} ( Area: {{ $room->area }} sqm, Price: ${{ $room->price }} )</option>
                        @else
                            <option value="{{ $room->id }}">{{ $room->name }} ( Area: {{ $room->area }} sqm, Price: ${{ $room->price }} )</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6 form-group">
                <label for="start-date">SQM</label>
                <input type="text" id="sqm" class="form-control">
                <div class="errorTxt"></div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-6 form-group">
                <label for="customer_id">Select Customer</label>
                <select id="customer_id" name="customer_id" class="form-control">
                    @foreach($customers as $customer)
                        @if ((isset($contract)) && $customer->id == $contract->customer_id)
                            <option value="{{ $customer->id }}"
                                    selected="selected">{{ $customer->name }}</option>
                        @else
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6 form-group">
                <label for="start-date">Contract Start Date</label>
                <input type="date" name="start_date" id="daterange-3"
                       value="@if(isset($contract)){{ $contract->start_date }}@endif"
                       class="form-control">
                <div class="errorTxt"></div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-6 form-group">
                <label for="end-date">Contract End Date</label>
                <input type="date" name="end_date" id="daterange-4"
                       value="@if(isset($contract)){{ $contract->end_date }}@endif"
                       class="form-control">
                <div class="errorTxt"></div>
            </div>
            <div class="col-sm-6 form-group">
                <label for="payment-method">Payment Method</label>
                <select name="payment_method" class="form-control select2-payment-method"
                        style="width: 100%" data-allow-clear="true">
                    <option></option>
                    @foreach ($paymentMethods as $paymentMethod)
                        @if ((isset($contract)) && $paymentMethod->code == $contract->payment_method)
                            <option value="{{ $paymentMethod->code }}"
                                    selected="selected">{{ $paymentMethod->name }}</option>
                        @else
                            <option value="{{ $paymentMethod->code  }}">{{ $paymentMethod->name }}</option>
                        @endif
                    @endforeach
                </select>
                <div class="errorTxt"></div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-6 form-group">
                <label for="payment-cycle">Debit Type</label>
                <select name="payment_cycle" class="form-control select2-payment-cycle"
                        style="width: 100%" data-allow-clear="true">
                    <option></option>
                    @foreach ($paymentCycles as $paymentCycle)
                        @if ((isset($contract)) && $paymentCycle->id == $contract->payment_cycle)
                            <option value="{{ $paymentCycle->id }}"
                                    selected="selected">{{ $paymentCycle->name }}</option>
                        @else
                            <option value="{{ $paymentCycle->id  }}">{{ $paymentCycle->name }}</option>
                        @endif
                    @endforeach
                </select>
                <div class="errorTxt"></div>
            </div>
            <div class="col-sm-6 form-group">
                <label for="discount">Index Percentage</label>
                <input type="number" name="discount" id="discount" class="form-control"
                       value="{{ (isset($contract)) ? $contract->discount:'0' }}">
                <div class="errorTxt"></div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-6 form-group">
                <label for="nr_termination">Nr of Month (Termination)</label>
                <input type="number" name="nr_termination" id="nr_termination" class="form-control"
                       value="{{ (isset($contract)) ? $contract->nr_termination:'0' }}">
                <div class="errorTxt"></div>
            </div>
            <div class="col-sm-6 form-group">
                <label for="nr_landlord">Nr of Month (Termination Landlord)</label>
                <input type="number" name="nr_landlord" id="nr_landlord" class="form-control"
                       value="{{ (isset($contract)) ? $contract->nr_landlord:'0' }}">
                <div class="errorTxt"></div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-6 form-group">
                <label for="monthly_rent">Monthly Rent</label>
                <input type="number" name="monthly_rent" id="monthly_rent" class="form-control"
                       value="{{ (isset($contract)) ? $contract->monthly_rent:'0' }}">
                <div class="errorTxt"></div>
            </div>
            <div class="col-md-6 form-group" style="margin-top: 30px">
                <input type="checkbox" id="continues" data-toggle="switch" class="custom-control-input">
                <label class="custom-control custom-checkbox" style="font-size: 14px;">
                    <span class="custom-control-indicator"></span>
                    &nbsp;&nbsp;&nbsp;Continues (Rolling Termination)
                </label>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="col-sm-12 form-group">
                <label for="note">Note</label>
                <textarea name="note" id="note" class="form-control"
                          rows="5">{{ (isset($contract)) ? $contract->note : '' }}</textarea>
                <div class="errorTxt"></div>
            </div>
        </div>
    </div>


    <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
        <!-- <button type="button" class="btn" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> BACK</button>&nbsp;&nbsp; -->
        <a href="{!! route('company.contracts.index') !!}" class="btn btn-default"><i
                    class="fa fa-times"></i> CANCEL</a>
        <button type="submit" class="btn btn-primary" id="submit_contract">@if(isset($contract)) Update @else Save @endif</button>
    </div>
</form>