@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Company Hr Pre Employment
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('company.company_hr_pre_employments.show_fields')
                    <a href="{!! route('company.companyHrPreEmployments.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
