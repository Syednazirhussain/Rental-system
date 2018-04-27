@extends('company.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Settings / </span>Add Newsletter Group</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Add Group</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('company.newsletterGroups.store') }}" method="POST" id="groupForm">
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
        </div>
    </div>
@endsection