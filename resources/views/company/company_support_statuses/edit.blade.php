@extends('company.default')

@section('content')

     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Support / Status </span>{{ $supportStatus->name }}</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">{{ $supportStatus->name }}</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('company.supportStatuses.update', [$supportStatus->id]) }}" method="POST" id="supportStatusForm">
                        
                            @include('company.company_support_statuses.fields')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
