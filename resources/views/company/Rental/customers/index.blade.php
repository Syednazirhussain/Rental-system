@extends('company.default')

@section('content')

    <div class="px-content">

        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i><a
                            href="{{ route('company.rcustomer.index') }}">Customers</a></span></h1>
        </div>

        <div class="panel">
            <div class="panel-body">

                @if (session()->has('msg.success'))
                    @include('layouts.success_msg')
                @endif

                @if (session()->has('msg.error'))
                    @include('layouts.error_msg')
                @endif

                <div class="row m-b-2">
                    <div class="col-md-2 text-right">
                        <div style="font-size: 15px; margin-top: 3px;">Customers Search</div>
                    </div>
                    <div class="col-md-4 customer_search_field" >
                        <input type="text" class="form-control" id="search_customers" placeholder="Name, Org.nr, Email">
                    </div>
                    <div class="col-md-2 text-right customer_search_field">
                        <div style="font-size: 13px; margin-top: 5px;"><a id="expand_search">Expanded Search</a></div>
                    </div>
                    <div class="col-md-6 text-right advance_search_field" hidden>
                        <div style="font-size: 13px; margin-top: 5px;"><a id="origin_search">Original Search</a></div>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{ route('company.rcustomer.create') }}" class="btn btn-primary"><i
                                    class="fa fa-plus"></i> Create Customer</a>
                    </div>
                </div>
                <div class="row m-b-2" id="expand_search_panel" hidden>
                    <div class="col-md-1 col-md-offset-1">
                        <label class="custom-control custom-checkbox" style="font-size: 14px; margin-top: 4px;">
                            <input type="checkbox" id="block_customer" data-toggle="switch" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            &nbsp;&nbsp;Active
                        </label>
                    </div>
                    <div class="col-md-3">
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
                    <div class="col-md-3">
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
                    <div class="col-md-2">
                        <button class="btn btn-primary" id="expand_search_start">Search</button>
                    </div>
                </div>

                <div class="table-primary">
                    @include('company.Rental.customers.table')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript">
        // -------------------------------------------------------------------------
        // Initialize DataTables
        $(function () {
            $('#datatables').dataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5'
                ]
            });

            $('#datatables_wrapper .table-caption').text('Customers');
            $('#datatables_wrapper .dataTables_filter input').attr('style', 'display: none');
        });

        /**
         ** When Building changes, floors automatically updated
         **/
        $('#building').on('change', function(){
            var getBuildingId = $('#building').val();

            $.ajax({
                url: '{{ route("company.companyFloorRooms.lists") }}',
                data: {building_id: getBuildingId},
                dataType: 'json',
                cache: false,
                type: 'POST', // For jQuery < 1.9
                success: function (data) {
                    if (data.success == 1) {
                        var option = "";

                        $.each(data.floors, function (i, item) {
                            option += '<option value="' + item.id + '">' + item.floor + '</option>';
                        });

                        $('#floor').html(option);
                    }
                },
                error: function (xhr, status, error) {

                }
            });
        });

        /**
        ** When Expand Search Link Clicked
        **/

        $('#expand_search').on('click', function(){
            document.getElementById('expand_search_panel').style.display = 'block';
            $('.customer_search_field').attr('style', 'display: none');
            $('.advance_search_field').attr('style', 'display: block');
        });

        $('#origin_search').on('click', function(){
            document.getElementById('expand_search_panel').style.display = 'none';
            $('.customer_search_field').attr('style', 'display: block');
            $('.advance_search_field').attr('style', 'display: none');
        });


        // Find advanced Search
        $('#expand_search_start').on('click', function(){
            var building = document.getElementById('building').value;
            var floor = document.getElementById('floor').value;
            $.ajax({
                url: '{{ route("company.rcustomer.advance_search") }}',
                data: {building: building, floor: floor},
                dataType: 'json',
                cache: false,
                type: 'POST', // For jQuery < 1.9
                success: function (data) {
                    if(data.success) {
                        var customer_body = '';
                        var customers = data.data.customers;
                        customers.forEach(function(customer, index) {
                            customer_body += '<tr class="odd gradeX">';
                            customer_body += '<td>' + index + '</td>';
                            customer_body += '<td>' + customer.name + '</td>';
                            customer_body += '<td>' + customer.org_no + '</td>';
                            customer_body += '<td>' + customer.category + '</td>';
                            customer_body += '<td>' + customer.tel_number + '</td>';
                            customer_body += '<td>' + customer.mobile + '</td>';
                            customer_body += '<td>' + customer.email + '</td>';
                            customer_body += '<td>' + customer.address_1 + '</td>';
                            customer_body += '<td>' + customer.address_2 + '</td>';
                            customer_body += '<td>' + customer.mobile + '</td>';
                            customer_body += '<td>' + customer.city + '</td>';
                            customer_body += '<td>' + customer.country + '</td>';
                            customer_body += '<td  width="200px" class="text-center">';
                            customer_body += '<form method="POST" action="{{ route('company.rcustomer.destroy', '%ID%') }}" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE">';
                            customer_body += '<input name="_token" type="hidden" value="{{ csrf_token() }}">';
                            customer_body += '<a href="{{ route('company.rcustomer.show', 1)}} "><i class="fa fa-eye fa-lg text-info"></i></a>';
                            customer_body += '&nbsp;';
                            customer_body += '<a href="{{ route('company.rcustomer.edit', '%ID%')}}"><i class="fa fa-edit fa-lg text-info"></i></a>';
                            customer_body += '&nbsp;';
                            customer_body += '<button type="submit" class="btn btn-danger btn-xs" onclick="return confirm("Are you sure?"><i class="fa fa-trash"></i></button>';
                            customer_body += '</form >';
                            customer_body += '</td >';
                            customer_body += '</tr >';
                            customer_body = customer_body.replace("%ID%", customer.id);
                            customer_body = customer_body.replace("%ID%", customer.id);
                        });
                        $('#customer_table_body').html(customer_body);
                    }
                },
                error: function (xhr, status, error) {

                }

            });
        });

        $("#search_customers").on('change', function () {
            var data = document.getElementById('search_customers').value;
            $.ajax({
                url: '{{ route("company.rcustomer.search") }}',
                data: {data: data},
                dataType: 'json',
                cache: false,
                type: 'POST', // For jQuery < 1.9
                success: function (data) {
                    if(data.success) {
                        var customer_body = '';
                        var customers = data.data.customers;
                        customers.forEach(function(customer, index) {
                            customer_body += '<tr class="odd gradeX">';
                            customer_body += '<td>' + index + '</td>';
                            customer_body += '<td>' + customer.name + '</td>';
                            customer_body += '<td>' + customer.org_no + '</td>';
                            customer_body += '<td>' + customer.category + '</td>';
                            customer_body += '<td>' + customer.tel_number + '</td>';
                            customer_body += '<td>' + customer.mobile + '</td>';
                            customer_body += '<td>' + customer.email + '</td>';
                            customer_body += '<td>' + customer.address_1 + '</td>';
                            customer_body += '<td>' + customer.address_2 + '</td>';
                            customer_body += '<td>' + customer.mobile + '</td>';
                            customer_body += '<td>' + customer.city + '</td>';
                            customer_body += '<td>' + customer.country + '</td>';
                            customer_body += '<td  width="200px" class="text-center">';
                            customer_body += '<form method="POST" action="{{ route('company.rcustomer.destroy', '%ID%') }}" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE">';
                            customer_body += '<input name="_token" type="hidden" value="{{ csrf_token() }}">';
                            customer_body += '<a href="{{ route('company.rcustomer.show', 1)}} "><i class="fa fa-eye fa-lg text-info"></i></a>';
                            customer_body += '&nbsp;';
                            customer_body += '<a href="{{ route('company.rcustomer.edit', '%ID%')}}"><i class="fa fa-edit fa-lg text-info"></i></a>';
                            customer_body += '&nbsp;';
                            customer_body += '<button type="submit" class="btn btn-danger btn-xs" onclick="return confirm("Are you sure?"><i class="fa fa-trash"></i></button>';
                            customer_body += '</form >';
                            customer_body += '</td >';
                            customer_body += '</tr >';
                            customer_body = customer_body.replace("%ID%", customer.id);
                            customer_body = customer_body.replace("%ID%", customer.id);
                        });
                        $('#customer_table_body').html(customer_body);
                    }
                },
                error: function (xhr, status, error) {

                }

            });
        });

    </script>
@endsection

