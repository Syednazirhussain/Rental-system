@extends('admin.default')

@section('content')



        <div class="px-content">
            <div class="page-header">
                <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Settings / </span>Admin General Settings</h1>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    @if(Session::has('GeneralSettingError'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('GeneralSettingError') }}
                        </div>
                    @endif
                    <div class="panel">
                        <form action="{{ route('admin.userStatuses.addOrUpdate') }}" method="POST">
                            <div class="panel-heading">
                                <div class="panel-title">General Information</div>
                            </div>
                            <div class="panel-body">
                                    @include('admin.admin_general.general')
                            </div>
                            <div class="panel-heading">
                                <div class="panel-title">Tax &amp; Invoice validition</div>
                            </div>
                            <div class="panel-body">
                                    @include('admin.admin_general.tax')
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


@endsection