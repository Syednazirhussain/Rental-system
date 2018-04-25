@extends('company.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Send Mail to Group</span></h1>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-body">
                        <form action="{{ route('company.newsletters.sendmail') }}" method="post" enctype="multipart/form-data">
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
                                <textarea name="message_content" class="form-control" id="message_content" rows="15"></textarea>
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
        </div>
    </div>
@endsection

{{-- Include Ckeditor for text edit --}}
@section('js')
    <script>
        $(function() {
            $('#message_content').summernote({
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
    @parent
@stop