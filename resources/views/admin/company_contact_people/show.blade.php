@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Company Contact Person
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.company_contact_people.show_fields')
                    <a href="{!! route('admin.companyContactPeople.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
