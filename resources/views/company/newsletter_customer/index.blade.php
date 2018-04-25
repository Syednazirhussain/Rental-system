
@extends('company.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i>Newsletter Customers / </span></h1>
        </div>

        <div class="panel">
            <div class="panel-body">

                @if (session()->has('msg.success'))
                    @include('layouts.success_msg')
                @endif

                @if (session()->has('msg.error'))
                    @include('layouts.error_msg')
                @endif

                <div class="text-right m-b-3">
                    <a href="{{ route('company.newsletterCustomers.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add
                        Customer</a>
                </div>

                <div class="table-primary">
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
                                    <td><a href="{{ route('company.newsletterCustomers.edit', $customer->id) }}" class="btn btn-link">Edit</a></td>
                                    <td>
                                        <form action="{{ route('company.newsletterCustomers.destroy', $customer->id) }}" method="post">
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