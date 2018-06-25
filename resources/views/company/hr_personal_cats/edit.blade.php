@extends('company.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon fa fa-edit"></i><a href="{{ route('company.hrPersonalCats.index')}}">Company HR / Personal Categories</a> / </span>Edit "{!! ucfirst($hrPersonalCat->name) !!}"</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Edit "{!! ucfirst($hrPersonalCat->name) !!}"</div>
                    </div>
                    <div class="panel-body">
                   {!! Form::model($hrPersonalCat, ['route' => ['company.hrPersonalCats.update', $hrPersonalCat->id], 'method' => 'patch', 'id' => 'form']) !!}

                        @include('company.hr_personal_cats.fields')

                   {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection