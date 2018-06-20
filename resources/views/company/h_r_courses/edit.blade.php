@extends('company.default')

@section('content')

     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i><a href="{{ route('company.hRCourses.index')}}">Company HR / HR Courses</a> / </span>Edit HR Courses</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">{{ $hRCourses->name }}</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('company.hRCourses.update', [$hRCourses->id]) }}" method="POST" id="hrCourseForm">
                        
                            @include('company.h_r_courses.fields')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

