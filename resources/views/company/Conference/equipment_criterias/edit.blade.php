@extends('company.default')

@section('content')
     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Equipments Criteria / </span>Edit "{{$equipmentCriteria->title}}"</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Edit "{{$equipmentCriteria->title}}"</div>
                    </div>
                    <div class="panel-body">
                      <form action="{{ route('company.conference.equipmentCriterias.update', $equipmentCriteria->id) }}" method="POST" id="equipCriteriaForm">
                        <input name="_method" type="hidden" value="PATCH">

                        @include('company.Conference.equipment_criterias.fields')

                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
