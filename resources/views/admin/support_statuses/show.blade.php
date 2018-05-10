@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Support Status
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.support_statuses.show_fields')
                    <a href="{!! route('admin.supportStatuses.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
