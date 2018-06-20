@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Lease Attachment
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('company.lease_attachments.show_fields')
                    <a href="{!! route('company.leaseAttachments.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
