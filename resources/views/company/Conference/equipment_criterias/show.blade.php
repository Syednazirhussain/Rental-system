@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Equipment Criteria
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('company.Conference.equipment_criterias.show_fields')
                    <a href="{!! route('company.conference.equipmentCriterias.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
