@extends('admin.default')

@section('content')
<div class="px-content">
    <div class="page-header">
      <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i>Newsletter / </span>Groups</h1>
    </div>

    <div class="panel">
      <div class="panel-body">

            <div class="col-md-8">
                {{--<form method="post" action="/group/mailto" id="mail_send_form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="select_group">Select a Group</label>
                        <select class="form-control" id="select_group" name="group_id">
                            @foreach ($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message_subject">Subject</label>
                        <input name="message_subject" class="form-control" id="message_subject">
                    </div>
                    <div class="form-group">
                        <label for="message_content">Message</label>
                        <textarea name="message_content" class="form-control" id="message_content" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="file_upload">Attachment:</label>
                        <br/>
                        <input type="file" name="file" id="file_upload" />
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>--}}
                <form action="{{ route('admin.newsletter.groups.mailto') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="select_group">Select a Group</label>
                        <select class="form-control" id="select_group" name="group_id">
                            @foreach ($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message_subject">Subject</label>
                        <input name="message_subject" class="form-control" id="message_subject">
                    </div>
                    <div class="form-group">
                        <label for="message_content">Message</label>
                        <textarea name="message_content" class="form-control" id="message_content" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="file_upload">Attachment:</label>
                        <br/>
                        <input type="file" name="file" id="file_upload" />
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
@stop


@section('js')
    <script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('message_content');
    </script>
    @parent
@stop