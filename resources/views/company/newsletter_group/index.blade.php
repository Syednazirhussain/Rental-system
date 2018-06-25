@extends('company.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i> </span>Newsletter Groups</h1>
        </div>

        <div class="panel">
            <div class="panel-body">

                <!-- @if (session()->has('msg.success'))
                    @include('layouts.success_msg')
                @endif

                @if (session()->has('msg.error'))
                    @include('layouts.error_msg')
                @endif
 -->
                 @if(Session::has('successMessage'))
                  <div class="alert alert-success alert-dismissable" style="text-align: center;">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <h4 class="m-t-0 m-b-0"><strong><i class="fa fa-check-circle fa-lg"></i>&nbsp;&nbsp;{{Session::get('successMessage')}}</strong></h4>
                  </div>
                  @elseif(Session::has('deleteMessage'))
                  <div class="alert alert-success alert-dismissable" style="text-align: center;">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <h4 class="m-t-0 m-b-0"><strong><i class="fa fa-trash fa-lg"></i>&nbsp;&nbsp;{{Session::get('deleteMessage')}}</strong></h4>
                  </div>
                  @endif

                <div class="text-right m-b-3">
                    <a href="{{ route('company.newsletterGroups.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create</a>
                </div>

                <div class="table-primary">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered" id="dataTable">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Amount of Customers</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($groups as $group)
                                <tr>
                                    <th scope="row">{{ $loop->index }}</th>
                                    <td><a href="{{ route('company.newsletterCustomers.index', ['group_id' => $group->id]) }}">{{ $group->name }}</a></td>
                                    <td>{{ $group->customers->count() }}</td>
                                    <td><a href="{{ route('company.newsletterGroups.edit', $group->id) }}" class="btn btn-link">Edit</a></td>
                                    <td>
                                        <form action="{{ route('company.newsletterGroups.destroy', $group->id) }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="submit" value="Delete" class="btn btn-danger btn-block" onclick="return confirm('Are you sure to delete?')">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        // -------------------------------------------------------------------------
        // Initialize DataTables
        $(function () {
            $('#dataTable').dataTable();
            $('#roomsTable_wrapper .table-caption').text('Newsletter Groups');
            $('#roomsTable_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
        });
    </script>
@endsection





