@extends('admin.default')

@section('content')

     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i><a href="{{ route('admin.supports.index') }}">Support</a>  / <a href="{{route('admin.supportPriorities.index')}}">Priorities</a>  / </span>Add Priority</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Add Priority</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('admin.supportPriorities.store') }}" method="POST" id="supportPriorityForm">
                            @include('admin.support_priorities.fields')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
