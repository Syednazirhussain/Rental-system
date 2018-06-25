<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($survey))
    <input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">
    <div class="col-sm-12 form-group">
        <label for="company_id">Company Name</label>
        <input type="text" id="company_id" class="form-control" value="{{ $company_name }}" disabled>
    </div>
    <div class="col-sm-12 form-group">
        <label for="category_code">Category</label>
        <select id="category_code" name="category_code" class="form-control">
            @foreach($categories as $category)
                @if(isset($survey) && $survey->category_code == $category->code)
                    <option value="{{ $category->code }}" selected>{{ $category->name }}</option>
                @else
                    <option value="{{ $category->code }}">{{ $category->name }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="col-sm-12 form-group">
        <label for="survey">Survey</label>
        <input type="text" name="survey" id="survey" class="form-control" value="@if(isset($survey)){{ $survey->survey }}@endif">
    </div>
    <div class="col-sm-12 form-group">
        <label for="status">Status</label>
        <select id="status" name="status" class="form-control">
                @if(isset($survey) && $survey->status == 'publish')
                    <option value="publish" selected>Publish</option>
                @else
                    <option value="publish">Publish</option>
                @endif
                @if(isset($survey) && $survey->status == 'unpublish')
                    <option value="unpublish" selected>Unpublish</option>
                @else
                    <option value="unpublish">Unpublish</option>
                @endif
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
                'survey': {
                    required: true,
                }
            }
        });

    </script>
@endsection
