@extends('company.default')

@section('content')

    <div class="px-content">

        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i><a href="{{ route('company.supports.index') }}">Support</a></span></h1>
        </div>

        <div class="panel">
            <div class="panel-body">

                @include('company.support_company.master')

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="content">
                            <h2 class="header">
                                Hello world
                                <span class="pull-right">
                                    <a href="#" class="btn btn-success">Mark Complete</a>
                                </span>
                            </h2>
                            <div class="panel well well-sm">
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <p> <strong>Owner</strong>: Orin Waters</p>
                                            <p> <strong>Status</strong>: 
                                                <span style="color: #e69900">Pending</span>
                                            </p>
                                            <p>
                                                <strong>Priority</strong>: 
                                                <span style="color: #069900">Low</span>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p> <strong>Responsible</strong>: Prof. Susie Gaylord II</p>
                                            <p>
                                                <strong>Category</strong>: 
                                                <span style="color: #0014f4">Technical</span>
                                            </p>
                                            <p> <strong>Created</strong>: 1 minute ago</p>
                                            <p> <strong>Last Update</strong>: 34 seconds ago</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p> </p><p><span style="color:rgb(115,115,115);background-color:rgb(245,245,245);">Describe your issue here in details</span><br></p> <p></p>
                            </div>
                        </div>
                    </div>
                </div>

<!--                 <div class="panel panel-default">
                    <h2>Comments</h2>
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Orin Waters
                            <span class="pull-right"> 1 minute ago </span>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="content">
                            <p> </p><p>636363633</p><p><br></p> <p></p>
                        </div>
                    </div>
                </div> -->


                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal">
                            <input name="_token" type="hidden">
                            <input name="ticket_id" type="hidden" value="1">

                            <fieldset>
                                <legend>Reply</legend>
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <textarea id="summernote-base"></textarea>
                                        <span class="help-block">Describe your issue here in details</span>
                                    </div>
                                </div>
                                <div class="text-right col-md-12">
                                    <input class="btn btn-primary" type="submit" value="Submit">
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>

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