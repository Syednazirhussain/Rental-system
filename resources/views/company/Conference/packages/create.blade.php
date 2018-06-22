@extends('company.default')

@section('content')

     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon fa fa-plus"></i>Conference / Food &amp; Drinks / Packages / </span>Add Package</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Add Package</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('company.conference.packages.store') }}" method="POST" id="packageForm">
                    

                            @include('company.Conference.packages.fields')

                    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection



