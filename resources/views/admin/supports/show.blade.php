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
                                {{ $support->subject }}
                                <span class="pull-right">
                                    <a href="{{ route('admin.supports.solved',[$support->id]) }}" class="btn btn-success">Mark Complete</a>

                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">Edit</button>

                                    <a href="#" class="btn btn-danger deleteit" form="delete-ticket-27" node="Asperiores praesentium vero et quo quaerat sunt.">Delete</a>

                                </span>
                            </h2>
                            <div class="panel well well-sm">
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <p> <strong>Owner</strong>: {{$support->user->name }}</p>
                                                <p><strong>Status</strong>:
                                                    @if($support->supportStatus->name == 'Pending')
                                                    <span class="label label-warning">{{ $support->supportStatus->name }}</span>
                                                    @elseif($support->supportStatus->name == 'Solved')
                                                    <span class="label label-primary">{{ $support->supportStatus->name }}</span>
                                                    @elseif($support->supportStatus->name == 'Bug')
                                                    <span class="label label-danger">{{ $support->supportStatus->name }}</span>
                                                    @endif
                                            </p>
                                                <p><strong>Priority</strong>:
                                                    @if($support->supportPriority->name == 'Low')
                                                    <span class="label label-info">{{ $support->supportPriority->name }}</span>
                                                    @elseif($support->supportPriority->name == 'Normal')
                                                    <span class="label label-warning">{{ $support->supportPriority->name }}</span>
                                                    @elseif($support->supportPriority->name == 'Critical')
                                                    <span class="label label-danger">{{ $support->supportPriority->name }}</span>
                                                    @endif
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p> <strong>Responsible</strong>: {{ auth()->guard('admin')->user()->name }}</p>
                                                <p><strong>Category</strong>:
                                                    <span class="label label-success">{{ $support->supportCategory->name }}</span>
                                            </p>
                                            <p> <strong>Created</strong>: {{ \Carbon\Carbon::parse($support->created_at)->diffForHumans() }}</p>
                                            <p> 
                                                <strong>Last Update</strong>:
                                                <?php
                                                if(isset($reply))
                                                {
                                                    $last = count($reply);
                                                    echo \Carbon\Carbon::parse($reply[$last-1]->updated_at)->diffForHumans();
                                                }
                                                else
                                                {
                                                    echo \Carbon\Carbon::parse($support->updated_at)->diffForHumans();
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <?php echo html_entity_decode($support->content) ?>
                            </div>
                        </div>
                    </div>
                </div>

                @if(isset($reply))

                @foreach($reply as $rply)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                {{ $rply->user->name }}
                                <span class="pull-right"> {{ \Carbon\Carbon::parse($rply->created_at)->diffForHumans() }} </span>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="content">
                                <?php echo html_entity_decode($rply->content) ?>
                            </div>
                        </div>
                    </div>
                @endforeach

                @endif

                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="POST" action="{{ route('admin.supports.store') }}" accept-charset="UTF-8" class="form-horizontal">

                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <input name="parent_id" type="hidden" value="{{ $support->id }}">
                            <input name="subject" type="hidden" value="{{ $support->subject }}">
                            <input name="status_id" type="hidden" value="{{ $support->status_id }}">
                            <input name="priority_id" type="hidden" value="{{ $support->priority_id }}">
                            <input name="category_id" type="hidden" value="{{ $support->category_id }}">
                            <input name="user_id" type="hidden" value="{{ auth()->guard('admin')->user()->id }}">
                            <fieldset>
                                <legend>Reply</legend>
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <textarea id="summernote-base" name="content"></textarea>
                                        <span class="help-block">Describe your issue here in details</span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <a href="{{ route('admin.supports.index') }}" class="btn btn-default"><i class="fa fa-long-arrow-left"></i>&nbsp;Back</a>
                                    <input class="btn btn-primary" type="submit" value="Submit">
                                </div>
                            </fieldset>
                        </form>
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