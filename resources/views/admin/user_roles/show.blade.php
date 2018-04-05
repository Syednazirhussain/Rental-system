@extends('admin.default')

@section('content')


  <div class="px-content">
    <div class="page-header">
      <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i>Settings / User Roles / </span>{!! $userRole->id !!}</h1>
    </div>

    <div class="panel">
      <div class="panel-body">

       @include('admin.user_roles.show_fields')


      </div>
    </div>
  </div>




@endsection
