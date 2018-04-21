@extends('company.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light">
                    <i class="page-header-icon ion-android-checkbox-outline"></i>
                    Settings /
                </span>
                @if(isset($user))
                    {{ "Edit" }}
                @else
                    {{ "Add" }}
                @endif User
            </h1>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">@if(isset($user)){{ "Edit" }}@else{{ "Add" }}@endif User</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('company.users.update', [$user->id]) }}" method="POST" id="userForm">

                            @include('company.dashboard.fields')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection