@extends('admin.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Payment Cycles / </span>Add Payment Cycle</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Add Payment Cycle</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('admin.paymentCycles.store') }}" method="POST" id="paymentCycForm">

                            @include('admin.payment_cycles.fields')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
