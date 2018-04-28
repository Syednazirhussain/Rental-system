@extends('admin.default')

@section('content')
<div class="px-content">
    <div class="page-header">
      <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i>Newsletter / </span>Customers</h1>
    </div>

    <div class="panel">
      <div class="panel-body">
            <div class="col-md-12">
                <!-- <button onclick="window.location='{{ url("/customer/create") }}'" type="button" class="btn btn-primary">Add New Customer</button> -->
                <a href="{{ route('admin.customers.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Customer</a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Description</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <th scope="row">{{ $loop->index }}</th>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->description }}</td>
                            <td><a href="{{ route('admin.customers.edit', $customer->id) }}" class="btn btn-link">Edit</a></td>
                            <td>
                                <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="post">
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
@endsection