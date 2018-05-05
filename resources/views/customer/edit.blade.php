@extends('admin.default')

@section('content')
<div class="px-content">
    <div class="page-header">
      <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i>Newsletter / Customer /</span>{{ $customer->name }}</h1>
    </div>

    <div class="panel">
      <div class="panel-body">


            <div class="col-md-8">

                <form method="post" action="{{ route('admin.customers.update', $customer->id) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="customer_name">Name</label>
                        <input type="text" name="name" class="form-control" id="customer_name" value="{{ $customer->name }}">
                    </div>
                    <div class="form-group">
                        <label for="customer_email">Email</label>
                        <input type="email" name="email" class="form-control" id="customer_email" value="{{ $customer->email }}">
                    </div>
                    <div class="form-group">
                        <label for="customer_description">Description</label>
                        <input type="text" name="description" class="form-control" id="customer_description" value="{{ $customer->description }}">
                    </div>
                    <div class="form-group">
                        <label for="select_group">Select a Group</label>
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
@endsection