@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Support Category
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('company.company_company_company_support_categories.show_fields')
                    <a href="{!! route('company.supportCategories.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
