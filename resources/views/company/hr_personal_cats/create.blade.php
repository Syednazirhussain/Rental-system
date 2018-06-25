@extends('company.default')

@section('content')
    <div class="px-content">        
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon fa fa-plus"></i><a href="{{ route('company.hrPersonalCats.index')}}">Company HR </a> / </span> Personal Categories</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Create HR Personal Categories</div>
                    </div>
                    <div class="panel-body">
                    {!! Form::open(['route' => 'company.hrPersonalCats.store', 'id' => 'form']) !!}

                        @include('company.hr_personal_cats.fields')

                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection
