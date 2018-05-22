@extends('company.default')

@section('content')

    <div class="px-content">

        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i><a href="{{ route('company.companySupports.index') }}">Support</a></span></h1>
        </div>

        <div class="panel">
            <div class="panel-body">

                @if(session()->has('msg.success'))
                    @include('layouts.success_msg')
                @endif


                @include('company.company_support_panel.master')

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="content">
                            <h2 class="header">
                                {{ $support->subject }}
                                <span class="pull-right">

                                    @if($support->status_id == 3)
                                        
                                    @else
                                        <a href="{{ route('company.companySupports.complete',[$support->id]) }}" class="btn btn-success">Mark Complete</a>
                                    @endif
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">Edit</button>
<!--                                     <a href="#" class="btn btn-danger deleteit" form="delete-ticket-27" node="Asperiores praesentium vero et quo quaerat sunt.">Delete</a> -->
                                </span>
                            </h2>
                            <div class="panel well well-sm">
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <p> <strong>Owner</strong>: {{$support->user->name }}</p>
                                                <p><strong>Status</strong>:
                                                    @if($support->companySupportStatus->name == 'Pending')
                                                    <span class="label label-warning">{{ $support->companySupportStatus->name }}</span>
                                                    @elseif($support->companySupportStatus->name == 'Solved')
                                                    <span class="label label-primary">{{ $support->companySupportStatus->name }}</span>
                                                    @elseif($support->companySupportStatus->name == 'Bug')
                                                    <span class="label label-danger">{{ $support->companySupportStatus->name }}</span>
                                                    @endif
                                            </p>
                                                <p><strong>Priority</strong>:
                                                    @if($support->companySupportPriority->name == 'Low')
                                                    <span class="label label-info">{{ $support->companySupportPriority->name }}</span>
                                                    @elseif($support->companySupportPriority->name == 'Normal')
                                                    <span class="label label-warning">{{ $support->companySupportPriority->name }}</span>
                                                    @elseif($support->companySupportPriority->name == 'Critical')
                                                    <span class="label label-danger">{{ $support->companySupportPriority->name }}</span>
                                                    @endif
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p> 
                                                <strong>Responsible</strong>:
                                                 {{ auth()->guard('company')->user()->name }}
                                             </p>
                                            <p>
                                                <strong>Category</strong>:
                                                    <span class="label label-success">{{ $support->companySupportCategory->name }}</span>
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
                        <form  action="{{ route('company.companySupports.store') }}" method="POST" id="commentForm" class="form-horizontal">

                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <input name="parent_id" type="hidden" value="{{ $support->id }}">
                            <input name="subject" type="hidden" value="{{ $support->subject }}">
                            <input name="status_id" type="hidden" value="{{ $support->status_id }}">
                            <input name="priority_id" type="hidden" value="{{ $support->priority_id }}">
                            <input name="category_id" type="hidden" value="{{ $support->category_id }}">
                            <input name="user_id" type="hidden" value="{{ auth()->guard('company')->user()->id }}">
                            <input name="last_comment" type="hidden" value="{{ auth()->guard('company')->user()->name }}">
                            <input name="company_id" type="hidden" value="{{ $support->company_id }}">
                            <input name="company_name" type="hidden" value="{{ $support->company_name }}">
                            <fieldset>
                                <legend>Reply</legend>
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <textarea id="summernote-base1" type="text" name="content"></textarea>
                                        <span class="help-block">Describe your issue here in details</span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i>&nbsp;Send</button>
                                    <!-- <input class="btn btn-primary" type="submit" value="Submit"> -->
                                    <a href="{{ route('company.companySupports.index') }}" class="btn btn-default"><i class="fa fa-times"></i>&nbsp;CANCEL</a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>

                <div class="modal fade in" id="modal-default" tabindex="-1">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('company.companySupports.update',[$support->id]) }}" id="modalForm" class="form-horizontal">

                            <input name="_method" type="hidden" value="PATCH">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title" id="ticket-edit-modal-Label">{{ $support->subject }}</h4>
                            </div>
                            <div class="modal-body">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Subject</label>
                                        <input class="form-control" required="required" name="subject" type="text" value="{{ $support->subject }}">
                                    </div>
                                    <div class="form-group">
                                        <textarea id="summernote-base2" name="content" required="required"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="priority_id" class="control-label">Priority: </label>
                                        <select class="form-control" name="priority_id">
                                            @if(isset($priorities))
                                                @foreach($priorities as $priority)
                                                    @if($support->priority_id == $priority->id)
                                                        <option value="{{ $priority->id }}" selected="selected">{{ $priority->name }}</option>
                                                    @else
                                                        <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                       
                                    <div class="col-sm-4">
                                        <label for="category_id" class="control-label">Category: </label>
                                        <select class="form-control" name="category_id">
                                            @if(isset($categories))
                                                @foreach($categories as $category)
                                                    @if($support->category_id == $category->id)
                                                        <option value="{{ $category->id }}" selected="selected">{{ $category->name }}</option>
                                                    @else
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                             
                                    <div class="col-sm-4">
                                        <label for="status_id" class="control-label">Status: </label>
                                        <select class="form-control" name="status_id">
                                            @if(isset($statues))
                                                @foreach($statues as $status)
                                                    @if($support->status_id == $status->id)
                                                    <option value="{{ $status->id }}" selected="selected">{{ $status->name }}</option>
                                                    @else
                                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>                                    
                                </div>
                            
                                <div class="col-sm-12 m-b-3 m-t-3">
                                    <input class="btn btn-primary" type="submit" value="Update">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                </div>  
                            </div>
                        </form>
                    </div>
                  </div>
                </div>

            </div>
        </div>
    </div>

    <input type="hidden" id="editTextBox" value="{{ $support->content }}">

@endsection


@section('js')
    <script type="text/javascript">

     var status_id = "<?php echo $support->status_id; ?>";



    if(status_id == 3)
    {
        $('ul#main_nav li:nth-child(1)').removeClass('active');
        $('ul#main_nav li:nth-child(2)').addClass('active');
    }


    // Initialize validator
    $('#commentForm').pxValidate({
        ignore: ":hidden:not(#summernote-base1),.note-editable.panel-body",
        focusInvalid: false,
        rules: {
          'content': {
            required: true
          }
        },
        messages: {
          'content': {
            required: "Please enter the content above",
          }
        }
    });


    $('#modalForm').pxValidate({
        ignore: ":hidden:not(#summernote-base2),.note-editable.panel-body",
        focusInvalid: false,
        rules: {
          'content': {
            required: true
          }
        },
        messages: {
          'content': {
            required: "Please enter the content above",
          }
        }
    });

    // Initialize Summernote
    $(function() {
      $('#summernote-base1').summernote({
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




    // Initialize Summernote
    $(function() {
      $('#summernote-base2').summernote({
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




    $(document).ready(function() { 
        var value = $('#editTextBox').val();
        $('#summernote-base2').summernote('editor.pasteHTML', value);
    });


    </script>
@endsection