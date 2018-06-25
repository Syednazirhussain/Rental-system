@extends('company.default')

@section('css')
    <style type="text/css">
        .feedback_question {
            font-size: 14px;
            font-weight: 500;
        }
        .star-rating {
            line-height:32px;
            font-size:2em;
        }

        .star-rating .fa-star{
            color: #FF851B;
        }

        .fa-star-o {
            color: grey;
        }
    </style>
@endsection

@section('content')

    <div class="px-content">

        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i><a href="{{ route('company.survey_answers.list') }}">Survey Answers</a></span></h1>
        </div>

        <div class="panel">
            <div class="panel-body">

                @if (session()->has('msg.success'))
                    @include('layouts.success_msg')
                @endif

                @if (session()->has('msg.error'))
                    @include('layouts.error_msg')
                @endif

                <div class="container">
                    @include('company.Survey.survey_answers.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection