@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Company Contract
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.company_contracts.show_fields')
                    <a href="{!! route('admin.companyContracts.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
