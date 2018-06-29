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
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i><a href="{{ route('company.feedback.index') }}">Send FeedBack</a></span></h1>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-body">
                        <form action="{{ route('company.send_feedback.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="select_group">Select a Survey</label>
                                <select class="form-control" id="select_group" name="survey_id">
                                    @foreach ($surveys as $survey)
                                        <option value="{{ $survey->id }}">{{ $survey->survey }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="select_group">Select a Customer</label>
                                <select class="form-control" id="select_group" name="customer_id">
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="select_group">Status</label>
                                <select class="form-control" id="select_group" name="status">
                                    <option value="publish">Publish</option>
                                    <option value="unpublish">Unpublish</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="custom-control custom-checkbox" style="font-size: 13px;">
                                    <input type="checkbox" id="send_mail" data-toggle="switch" class="custom-control-input" checked>
                                    <span class="custom-control-indicator"></span>
                                    &nbsp;&nbsp;Send Mail
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


