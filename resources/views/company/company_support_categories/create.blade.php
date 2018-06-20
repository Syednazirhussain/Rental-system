@extends('company.default')

@section('content')

     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i><a href="{{ route('company.supports.index') }}">Support</a>  / <a href="{{ route('company.supportCategories.index') }}">Categories</a> / </span> Add Category</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Add Category</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('company.supportCategories.store') }}" method="POST" id="supportCategoryForm">
                            @include('company.company_support_categories.fields')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
