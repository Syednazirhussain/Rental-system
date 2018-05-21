@extends('admin.default')

@section('content')

    <div class="px-content">

        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i><a href="{{ route('admin.supports.index') }}">Support</a></span></h1>
        </div>

        <div class="panel">
            <div class="panel-body">

                @include('admin.support_admin.master')



                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="content">
                            <h2 class="header">
                                Asperiores praesentium vero et quo quaerat sunt.
                                <span class="pull-right">
                                    <a href="#" class="btn btn-success">Mark Complete</a>

                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">Edit</button>

                                    <a href="#" class="btn btn-danger deleteit" form="delete-ticket-27" node="Asperiores praesentium vero et quo quaerat sunt.">Delete</a>

                                </span>
                            </h2>
                            <div class="panel well well-sm">
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <p> <strong>Owner</strong>: Kyra Kshlerin</p>
                                                <p><strong>Status</strong>:<span style="color: #e69900">Pending</span>
                                            </p>
                                                <p><strong>Priority</strong>:<span style="color: #e1d200">Normal</span>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p> <strong>Responsible</strong>: Lera Torphy</p>
                                                <p><strong>Category</strong>:<span style="color: #2b9900">Billing</span>
                                            </p>
                                            <p> <strong>Created</strong>: 4 days ago</p>
                                            <p> <strong>Last Update</strong>: 15 minutes ago</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p> 
                                    Quis eligendi aliquid ea enim et recusandae vero. Deserunt ipsam autem nemo laborum aliquid sint reprehenderit.
                                    <br>
                                    <br>
                                    Aut quam laudantium culpa modi nulla. Fugiat aut in incidunt illum. Quia maxime quod nisi. Labore blanditiis est quidem error. Non aut quidem nemo sint iusto sint corporis maxime.<br>
                                    <br>
                                    Culpa tenetur sint quam autem tenetur. Dicta corrupti itaque iste ut omnis. Laboriosam sit totam repellendus ut. Error consequatur cumque iure hic sequi. 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade in" id="modal-default" tabindex="-1">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal">
                            <input name="_method" type="hidden" value="PATCH"><input name="_token" type="hidden" value="">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title" id="ticket-edit-modal-Label">Asperiores praesentium vero et quo quaerat sunt.</h4>
                            </div>
                            <div class="modal-body">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Subject</label>
                                        <input class="form-control" required="required" name="subject" type="text" value="Asperiores praesentium vero et quo quaerat sunt.">
                                    </div>
                                    <div class="form-group">
                                        <textarea id="summernote-base">Summernote Editor</textarea>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="priority_id" class="control-label">Priority: </label>
                                    <select class="form-control" id="priority_id" name="priority_id">
                                        <option value="1">Low</option>
                                        <option value="2" selected="selected">Normal</option>
                                        <option value="3">Critical</option>
                                    </select>
                                </div>
                    
                                <div class="col-sm-6">
                                    <label for="agent_id" class="control-label">Agent: </label>
                                    <select class="form-control" id="agent_id" name="agent_id">
                                        <option value="auto">Auto Select</option>
                                        <option value="2" selected="selected">Lera Torphy</option>
                                        <option value="4">Shana Champlin</option>
                                    </select>
                                </div>
                   
                                <div class="col-sm-6">
                                    <label for="category_id" class="control-label">Category: </label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option value="1">Technical</option>
                                        <option value="2" selected="selected">Billing</option>
                                        <option value="3">Customer Services</option>
                                    </select>
                                </div>
                         
                                <div class="col-sm-6">
                                    <label for="status_id" class="control-label">Status: </label>
                                    <select class="form-control" id="status_id" name="status_id">
                                        <option value="1" selected="selected">Pending</option>
                                        <option value="2">Solved</option>
                                        <option value="3">Bug</option>
                                    </select>
                                </div>

                                <div class="col-sm-12 m-b-3 m-t-3">
                                    <input class="btn btn-primary" type="submit" value="Submit">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                                    
                            </div>

                        </form>
                    </div>
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