<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($survey))
    <input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">
    <div class="col-sm-12 form-group">
        <label for="topic">Topic</label>
        <input type="text" id="topic" name="topic" class="form-control">
    </div>
    <div class="col-sm-12 form-group">
        <label for="survey_id">Survey</label>
        <select id="survey_id" name="survey_id" class="form-control">
            @foreach($surveys as $survey)
                <option value="{{ $survey->id }}">{{ $survey->survey }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-12 form-group">
        <label for="answer_type">Answer Type</label>
        <select id="answer_type" name="answer_type" class="form-control">
            @foreach($answer_types as $answer_type)
                <option value="{{ $answer_type->code }}">{{ $answer_type->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-12 form-group">
        <label for="status">Status</label>
        <select id="status" name="status" class="form-control">
                <option value="publish">Publish</option>
                <option value="unpublish">Unpublish</option>
        </select>
    </div>
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">@if(isset($survey)) <i class="fa fa-refresh"></i>  Update Survey @else <i class="fa fa-plus"></i>  Add Survey @endif</button>
        <a href="{!! route('company.survey.index') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>


@section('js')
    <script type="text/javascript">
        // Initialize validator
        $('#surveyForm').pxValidate({
            focusInvalid: false,
            rules: {
                'topic': {
                    required: true,
                }
            }
        });

    </script>
@endsection
