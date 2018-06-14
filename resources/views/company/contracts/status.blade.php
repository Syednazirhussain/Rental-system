@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet">
    <link href="{{ asset('/css/scheduler.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.print.css" media="print" rel="stylesheet">
    <style>
        .fc-body .fc-resource-area .fc-scroller .fc-rows td {
            cursor: pointer;
        }
        .fc-body .fc-resource-area .fc-scroller .fc-rows td:hover {
            -webkit-box-shadow: 0 3px 14px 0 rgba(0,0,0,.15);
            -moz-box-shadow: 0 3px 14px 0 rgba(0,0,0,.15);
            box-shadow: 0 3px 14px 0 rgba(0,0,0,.15);
            background: #e8e8e8;
        }
    </style>
@endsection

@extends('company.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Settings / </span>Contract Status</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="calendar"></div>
                <input id="calendar_data" type="hidden" value="{{ isset($data) ? $data : '' }}">
            </div>
            <!-- Modal -->
            <div class="modal fade" id="createContractModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="row">
                                <div class="col-md-11">
                                    <h5 class="modal-title" id="exampleModalLabel">Create Contract</h5>
                                </div>
                                <div class="col-md-1 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <form id="create_contract_form">
                                    <div class="col-sm-12 form-group">
                                        <label for="contract-no">Select a Room</label>
                                        <select id="room_id" name="room_id" class="form-control">
                                            @foreach($rooms as $room)
                                                <option value="{{ $room->id }}">{{ $room->name }} ( Area: {{ $room->area }} sqm, Price: ${{ $room->price }} )</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label for="contract-no">Contract No.</label>
                                        <input type="text" name="number" id="contract-no" class="form-control"
                                               placeholder="Contract No"/>
                                        <div class="errorTxt"></div>
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label for="contract-description">Contract</label>
                                        <textarea name="content" id="contract-content" class="form-control"
                                                  rows="10"></textarea>
                                        <div class="errorTxt"></div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="start-date">Start Date</label>
                                        <input type="date" name="start_date" id="start_date"
                                               class="form-control">
                                        <div class="errorTxt"></div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="end-date">End Date</label>
                                        <input type="date" name="end_date" id="end_date"
                                               class="form-control">
                                        <div class="errorTxt"></div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <fieldset class="form-group">
                                            <label for="payment-method">Payment Method</label>
                                            <select name="payment_method" class="form-control select2-payment-method"
                                                    style="width: 100%" data-allow-clear="true">
                                                <option value="" disabled selected>Select Payment Method</option>
                                                @foreach ($paymentMethods as $paymentMethod)
                                                    <option value="{{ $paymentMethod->code  }}">{{ $paymentMethod->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="errorTxt"></div>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <fieldset class="form-group">
                                            <label for="payment-cycle">Payment Cycle</label>
                                            <select name="payment_cycle" class="form-control select2-payment-cycle"
                                                    style="width: 100%" data-allow-clear="true">
                                                <option value="" disabled selected>Select Payment Cycle</option>
                                                @foreach ($paymentCycles as $paymentCycle)
                                                    <option value="{{ $paymentCycle->id  }}">{{ $paymentCycle->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="errorTxt"></div>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="discount">Discount</label>
                                        <input type="number" name="discount" id="discount" class="form-control"
                                               value="{{ (isset($contract)) ? $contract->discount:'0' }}">
                                        <div class="errorTxt"></div>

                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <fieldset class="form-group">
                                            <label for="discount-type">Discount Type</label>
                                            <select name="discount_type" class="form-control select2-discount-type"
                                                    style="width: 100%" data-allow-clear="true" placeholder="Select Discount Type">
                                                <option value="" disabled selected>Select Discount Type</option>
                                                @foreach ($discountTypes as $discountType)
                                                        <option value="{{ $discountType->id  }}">{{ $discountType->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="errorTxt"></div>
                                        </fieldset>
                                    </div>
                                </form>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="save_category">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <script src="{{ asset('/js/scheduler.min.js') }}"></script>
    <script>
        // Initialize validator
        $('#create_contract_form').validate({
            rules: {
                'room_id': {
                    required: true,
                },
                'number': {
                    required: true,
                },
                'content': {
                    required: true,
                },
                'start_date': {
                    required: true,
                },
                'end_date': {
                    required: true,
                },
                'payment_method': {
                    required: true,
                },
                'discount': {
                    required: true,
                },
                'discount_type': {
                    required: true,
                },
                'payment_cycle': {
                    required: true,
                }
            },
            errorPlacement: function(error, element) {
                var placement = $(element).parent().find('.errorTxt');
                if (placement) {
                    $(placement).append(error)
                } else {
                    error.insertAfter(element);
                }
            }
        });

        var data = document.getElementById('calendar_data').value;
        var colors = ['#00ffff', '#f14d39', '#ffc371', '#56f9bb', '#952097', '#1f2a7e', '#c5b3f9' ]
        if(data) {
            data = JSON.parse(data);
        }
        console.log(data);
        var event_data = [];
        var resource_data = []
        for(var i=0; i< data.length; i++) {
            event_data.push({'title' : data[i].name, 'start' : data[i].start_date ? data[i].start_date : '', 'end' : data[i].end_date ? data[i].end_date : '', 'color' : colors[i % 7], 'resourceId' : data[i].id});
            resource_data.push({'id': data[i].id, 'title' : data[i].buildingName + ' - ' + data[i].floor + ' - ' + data[i].name});
        }

        $('#calendar').fullCalendar({
            schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
            height: 650,
            navLinks: true,
            header: {
                left: 'prev,next today month',
                center: 'title',
                right: 'timelineYear,timelineMonth,timelineWeek'
            },
            //Events
            events: event_data,
            defaultView: 'timelineDay',
            resourceLabelText: 'Rooms',
            resources: resource_data,
            selectable: true,
            select: function(startDate, endDate) {
                $('#start_date').val(startDate.year() + '-' + (startDate.month() + 1 > 9 ? '': '0') + (startDate.month() + 1) + '-' + (startDate.date() > 9 ? '' : '0') + startDate.date());
                $('#end_date').val(endDate.year() + '-' + (endDate.month() + 1 > 9 ? '': '0') + (endDate.month() + 1) + '-' + (endDate.date() > 9 ? '' : '0') + endDate.date());
                $('#createContractModal').modal({
                    show: true
                });
            }
        });

        jQuery(".fc-body .fc-resource-area .fc-scroller .fc-rows td").click(function(){
            location.href = "{{ route('company.contracts.create') }}";
        });


        $('#save_category').on('click', function() {
            var myform = document.getElementById("create_contract_form");
            var data = new FormData(myform);

            if ($('#create_contract_form').validate().form()) {
                $.ajax({
                    url: '{{ route("company.contracts.store") }}',
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST', // For jQuery < 1.9
                    success: function (data) {
                        $('#createContractModal').modal('hide');
                        window.location = '{{ route("company.contracts.status") }}';
                    },
                    error: function (xhr, status, error) {

                    }
                });
            }
        });
    </script>
@endsection
