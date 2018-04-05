@extends('admin.default')

@section('content')




        <div class="px-content">
            <div class="page-header">
                <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Settings / </span>Add User Role</h1>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">Add User Role</div>
                        </div>
                        <div class="panel-body">
                          <form action="{{ route('admin.userRoles.store') }}" method="POST" id="userRolesForm">

                                @include('admin.user_roles.fields')

                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



@endsection









