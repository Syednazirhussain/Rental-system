@extends('company.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Settings / </span>Add Newsletter Customer</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Add Customer</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('company.newsletterCustomers.store') }}" method="POST" id="customerForm">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="customer_name">Name</label>
                                <input type="text" name="name" class="form-control" id="customer_name">
                            </div>
                            <div class="form-group">
                                <label for="customer_email">Email</label>
                                <input type="email" name="email" class="form-control" id="customer_email">
                            </div>
                            <div class="form-group">
                                <label for="customer_description">Description</label>
                                <input type="text" name="description" class="form-control" id="customer_description">
                            </div>
                            <div class="form-group">
                                <label for="select_group">Select a group</label>
                                <select class="form-control" id="select_group" name="group_id">
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection