@extends('admin.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light">
                    <i class="page-header-icon ion-android-checkbox-outline"></i>
                    <a href="{{ route('admin.users.index') }}">Users</a> /
                </span>
                @if(isset($user)){{ $user->name }}@endif
            </h1>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">@if(isset($user)){{ $user->name  }}@endif</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('admin.users.update', [$user->id]) }}" method="POST" id="userForm">

                            @include('admin.users.fields')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection