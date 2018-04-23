@extends('admin.default')

@section('content')
<div class="px-content">
    <div class="page-header">
      <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i>Newsletter / </span>Groups</h1>
    </div>

    <div class="panel">
      <div class="panel-body">

            <div class="col-md-8">
                <form method="post" action="{{ route('admin.newsletter.groups.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="group_name">Name</label>
                        <input type="text" name="name" class="form-control" id="group_name">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection