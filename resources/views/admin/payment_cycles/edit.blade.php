@extends('admin.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light">
                    <i class="page-header-icon ion-android-checkbox-outline"></i>
                    Payment Method / Edit Payment Cycle
                </span>
            </h1>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Edit Payment Cycle</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('admin.paymentCycles.update', [$paymentCycle->id]) }}" method="POST" id="paymentCycForm">

                            @include('admin.payment_cycles.fields')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection