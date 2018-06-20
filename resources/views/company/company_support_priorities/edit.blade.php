@extends('company.default')

@section('content')

     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i><a href="{{ route('company.supports.index') }}">Support</a>  / <a href="{{route('company.supportPriorities.index')}}">Priorities</a>  / </span>{{ $supportPriorities->name }}</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">{{ $supportPriorities->name }}</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('company.supportPriorities.update', [$supportPriorities->id]) }}" method="POST" id="supportPriorityForm">
                        
                            @include('company.company_support_priorities.fields')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
