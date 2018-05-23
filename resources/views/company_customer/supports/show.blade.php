@extends('company_customer.default')

@section('content')

    <div class="px-content">

        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i><a href="{{ route('companyCustomer.supports.index') }}">Support</a></span></h1>
        </div>

        <div class="panel">
            <div class="panel-body">


                @include('company_customer.support_customer.master')

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="content">
                            <h2 class="header">
                                {{ $ticket->subject }}
                                <span class="pull-right">
<!--                                     <a href="#" class="btn btn-success">Mark Complete</a> -->
                                </span>
                            </h2>
                            <div class="panel well well-sm">
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <p> <strong>Owner</strong>: {{ $ticket->user->name  }}</p>
                                            <p> <strong>Status</strong>: 
                                                @if($ticket->companySupportStatus->name == 'Pending')
                                                <span class="label label-warning">{{ $ticket->companySupportStatus->name }}</span>
                                                @elseif($ticket->companySupportStatus->name == 'Solved')
                                                <span class="label label-primary">{{ $ticket->companySupportStatus->name }}</span>
                                                @elseif($ticket->companySupportStatus->name == 'Bug')
                                                <span class="label label-danger">{{ $ticket->companySupportStatus->name }}</span>
                                                @else
                                                <span class="label label-default">{{ $ticket->companySupportStatus->name }}</span>
                                                @endif
                                            </p>
                                            <p>
                                                <strong>Priority</strong>: 
                                                @if($ticket->companySupportPriority->name == 'Low')
                                                <span class="label label-info">{{ $ticket->companySupportPriority->name }}</span>
                                                @elseif($ticket->companySupportPriority->name == 'Normal')
                                                <span class="label label-warning">{{ $ticket->companySupportPriority->name }}</span>
                                                @elseif($ticket->companySupportPriority->name == 'Critical')
                                                <span class="label label-danger">{{ $ticket->companySupportPriority->name }}</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-md-6">
<!--                                             <p> <strong>Responsible</strong>: Prof. Susie Gaylord II</p> -->
                                            <p>
                                                <strong>Category</strong>: 
                                                <span class="label label-success">{{ $ticket->companySupportCategory->name }}</span>
                                            </p>
                                            <p> <strong>Created</strong>: {{ \Carbon\Carbon::parse($ticket->created_at)->diffForHumans() }}</p>
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
                                                       echo \Carbon\Carbon::parse($ticket->updated_at)->diffForHumans(); 
                                                    }

                                                ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <?php echo html_entity_decode($ticket->content) ?>
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
                        <form method="POST" action="{{ route('companyCustomer.supports.store') }}" id="commentForm" accept-charset="UTF-8" class="form-horizontal">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <input name="parent_id" type="hidden" value="{{ $ticket->id }}">
                            <input name="subject" type="hidden" value="{{ $ticket->subject }}">
                            <input name="status_id" type="hidden" value="{{ $ticket->status_id }}">
                            <input name="priority_id" type="hidden" value="{{ $ticket->priority_id }}">
                            <input name="category_id" type="hidden" value="{{ $ticket->category_id }}">
                            <input name="user_id" type="hidden" value="{{ auth()->guard('company_customer')->user()->id }}">
                            <input name="last_comment" type="hidden" value="{{ auth()->guard('company_customer')->user()->name }}">
                            <input name="company_id" type="hidden" value="{{ $ticket->company_id }}">
                            <input name="company_name" type="hidden" value="{{ $ticket->company_name }}">

                            <fieldset>
                                <legend>Reply</legend>
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <textarea id="summernote-base" name="content"></textarea>
                                        <span class="help-block">Describe your issue here in details</span>
                                    </div>
                                </div>
                                <div class="col-md-12">

                                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i>&nbsp;Send</button>
                                    <!-- <input class="btn btn-primary" type="submit" value="Submit"> -->
                                    <a href="{{ route('companyCustomer.supports.index') }}" class="btn btn-default"><i class="fa fa-times"></i>&nbsp;CANCEL</a>
                                
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

    var status_id = "<?php echo $ticket->status_id; ?>";



    if(status_id == 3)
    {
        $('ul#main_nav li:nth-child(1)').removeClass('active');
        $('ul#main_nav li:nth-child(2)').addClass('active');
    }


    // Initialize validator
    $('#commentForm').pxValidate({
        ignore: ":hidden:not(#summernote-base),.note-editable.panel-body",
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