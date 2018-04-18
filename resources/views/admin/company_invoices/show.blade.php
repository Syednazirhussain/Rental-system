@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Company Invoice
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                @unless(empty($Invoice))
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="container">
                            <div class="jumbotron">
                                <h2 class="heading">{{ $Invoice['Company'] }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                @endunless
                <div class="row" style="padding-left: 20px">
                    @include('admin.company_invoices.show_fields')
                    <a href="{!! route('admin.companyInvoices.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
