@extends('admin.default')

@section('content')

     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i><a href="{{ route('admin.supports.index') }}">Support</a>  / <a href="{{ route('admin.supportCategories.index') }}">Categories</a> / </span> {{ $supportCategory->name }}</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">{{ $supportCategory->name }}</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('admin.supportCategories.update', [$supportCategory->id]) }}" method="POST" id="supportCategoryForm">
                        
                            @include('admin.support_categories.fields')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
