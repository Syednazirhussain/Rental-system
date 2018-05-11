@extends('company.default')

@section('content')

    <div class="px-content">

        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i><a href="{{ route('company.supports.index') }}">Support</a></span></h1>
        </div>

        <div class="panel">
            <div class="panel-body">

                @include('company.support_company.master')
<div class="well bs-component">
        <form method="POST" action="http://ticketit.kordy.info/tickets" accept-charset="UTF-8" class="form-horizontal"><input name="_token" type="hidden" value="T0iPl6HtP77Ta7tcsMO3lFJaBtxNJrMxXWXn3MQa">
            <legend>Create New Ticket</legend>
            <div class="form-group">
                <label for="subject" class="col-lg-2 control-label">Subject: </label>
                <div class="col-lg-10">
                    <input class="form-control" name="subject" type="text" id="subject">
                    <span class="help-block">A brief of your issue ticket</span>
                </div>
            </div>
            <div class="form-group">
                <label for="content" class="col-lg-2 control-label">Description: </label>
                <div class="col-lg-10">
                    <textarea id="summernote-base"></textarea>
                    <span class="help-block">Describe your issue here in details</span>
                </div>
            </div>
            <div class="form-inline row">
                <div class="form-group col-lg-4">
                    <label for="priority" class="col-lg-6 control-label">Priority: </label>
                    <div class="col-lg-6">
                        <select class="form-control" name="priority_id"><option value="1">Low</option><option value="2">Normal</option><option value="3">Critical</option></select>
                    </div>
                </div>
                <div class="form-group col-lg-4">
                    <label for="category" class="col-lg-6 control-label">Category: </label>
                    <div class="col-lg-6">
                        <select class="form-control" name="category_id"><option value="1">Technical</option><option value="2">Billing</option><option value="3">Customer Services</option></select>
                    </div>
                </div>
                <input name="agent_id" type="hidden" value="auto">
            </div>
            <br>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <input class="btn btn-primary" type="submit" value="Submit">
                    <a href="{{ route('company.supports.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </form>
    </div>

        </div>
    </div>

@endsection


@section('js')
    <script type="text/javascript">

    // Initialize Summernote
    $(function() {
      $('#summernote-base').summernote({
        height: 200,
        toolbar: [
          ['parastyle', ['style']],
          ['fontstyle', ['fontname', 'fontsize']],
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough', 'superscript', 'subscript']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']],
          ['insert', ['picture', 'link', 'video', 'table', 'hr']],
          ['history', ['undo', 'redo']],
          ['misc', ['codeview', 'fullscreen']],
          ['help', ['help']]
        ],
      });
    });

    </script>
@endsection