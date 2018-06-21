@extends('company.default')

@section('content')
     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon fa fa-plus"></i>Buildings / Rooms / Room Equipments / Equipments Criteria / </span>Create Equipment Criteria</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Create Equipment Criteria</div>
                    </div>
                    <div class="panel-body">
                    <form action="{{ route('company.conference.equipmentCriterias.store') }}" method="POST" id="equipCriteriaForm">

                        @include('company.Conference.equipment_criterias.fields')

                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
