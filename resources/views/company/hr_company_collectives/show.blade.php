@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Hr Company Collective
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('company.hr_company_collectives.show_fields')
                    <a href="{!! route('company.hrCompanyCollectives.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
