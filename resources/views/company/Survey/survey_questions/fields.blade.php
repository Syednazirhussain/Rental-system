<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($question))
    <input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">
    <div class="col-sm-12 form-group">
        <label for="topic">Topic</label>
        <input type="text" id="topic" name="topic" class="form-control" value="@if(isset($question)){{ $question->topic }}@endif">
    </div>
    <div class="col-sm-12 form-group">
        <label for="survey_id">Survey</label>
        <select id="survey_id" name="survey_id" class="form-control">
            @foreach($surveys as $survey)
                @if(isset($question) && $question->survey_id == $survey->id)
                    <option value="{{ $survey->id }}" selected>{{ $survey->survey }}</option>
                @else
                    <option value="{{ $survey->id }}">{{ $survey->survey }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="col-sm-12 form-group">
        <label for="answer_type">Answer Type</label>
        <select id="answer_type" name="answer_type" class="form-control">
            @foreach($answer_types as $answer_type)
                @if(isset($question) && $question->answer_type == $answer_type->code)
                    <option value="{{ $answer_type->code }}" selected>{{ $answer_type->name }}</option>
                @else
                    <option value="{{ $answer_type->code }}">{{ $answer_type->name }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="col-sm-12 form-group" id="option_fields" @if(isset($question) && $question->answer_type == 'optional') '' @else hidden @endif>
        <div class="row">
            <div class="col-sm-2">
                <label>Add Options</label>
            </div>
            <div class="col-sm-10 text-right">
                <button type="button" class="btn btn-primary" id="addOptionBtn"> <i class="fa fa-plus"></i> Add More </button>
            </div>
        </div>
        <div id="option_lists">
            @if(isset($question))
                @foreach ($options as $option)
                    <div class="col-sm-12 form-group option_field">
                        <div class="col-sm-1">
                            <input type="hidden" name="option[{{ $option->id }}][pk]" data-option-pk="old-{{ $option->id }}"
                                   class="remove-option-id" value="{{ $option->id }}"/>
                            Code
                        </div>
                        <div class="col-sm-2">
                            <input type="text" name="option[{{ $option->id }}][code]" data-option-code="old-{{ $option->id }}"
                                   class="option-code form-control" value="{{ $option->code }}"/>
                        </div>
                        <div class="col-sm-1">
                            Name
                        </div>
                        <div class="col-sm-5">
                            <input type="text" name="option[{{ $option->id }}][name]" data-option-name="old-{{ $option->id }}"
                                   class="option-name form-control" value="{{ $option->name }}"/>
                        </div>
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-primary remove_option"><i class="fa fa-times fa-lg"></i></button>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="col-sm-12 form-group">
        <label for="status">Status</label>
        <select id="status" name="status" class="form-control">
            @if(isset($question) && $question->status == 'publish')
                <option value="publish" selected>Publish</option>
            @else
                <option value="publish">Publish</option>
            @endif
            @if(isset($question) && $question->status == 'unpublish')
                <option value="unpublish" selected>Unpublish</option>
            @else
                <option value="unpublish">Unpublish</option>
            @endif
        </select>
    </div>
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">@if(isset($question)) <i class="fa fa-refresh"></i>  Update Question @else <i class="fa fa-plus"></i>  Add Question @endif</button>
        <a href="{!! route('company.survey_question.index') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>


@section('js')
    <script type="text/javascript">
        // Initialize validator
        $('#surveyQuestionForm').pxValidate({
            rules: {
                'topic': {
                    required: true
                }
            }
        });

        $('#answer_type').on('change', function(e) {
            if(e.target.value == 'optional') {
                $('#option_fields').show();
            }else {
                $('#option_fields').hide();
            }
        });

        function optionValidationRules() {
            $('.option-code').each(function () {
                $(this).rules("add", {
                    required: true
                });
            });
            $('.option-name').each(function () {
                $(this).rules("add", {
                    required: true,
                });
            });

            $('.option-code').trigger('change');
        }

        var optionNum = 0;
        $('#addOptionBtn').on('click', function(e) {
            var option = '<div class="col-sm-12 form-group option_field">';
            option += '<div class="col-sm-1">';
            option += '<input type="hidden" name="option['+optionNum+'][pk]" data-option-pk="new-'+optionNum+'" class="remove-admin-id" value="new-'+optionNum+'" />';
            option += 'Code';
            option += '</div>';
            option += '<div class="col-sm-2">';
            option += '<input type="text" name="option['+optionNum+'][code]" data-option-code="new-'+optionNum+'" class="option-code form-control" />';
            option += '</div>';
            option += '<div class="col-sm-1">';
            option += 'Name';
            option += '</div>';
            option += '<div class="col-sm-5">';
            option += '<input type="text" name="option['+optionNum+'][name]" data-option-name="new-'+optionNum+'" class="option-name form-control" />';
            option += '</div>';
            option += '<div class="col-sm-3">';
            option += '<button type="button" class="btn btn-primary remove_option"><i class="fa fa-times fa-lg"></i></button>';
            option += '</div>';
            option += '</div>';

            $('#option_lists').prepend(option);
            optionNum += 1;

            optionValidationRules();
        });

        var edit_question = "{{ isset($question) ? $question->id: 0 }}";
        $(document).on('click', '.remove_option', function(e) {

            if (confirm('Are you sure?')) {
                if (edit_question == 0) {
                    $(this).closest('.option_field').remove();
                } else {
                    var getOptionId = $(e.target).closest('.option_field').find('.remove-option-id').val();
                    var data = { _method: "delete", option_id: getOptionId };

                    $.ajax({
                        url: '{{ route("company.question_option.destroy") }}',
                        data: data,
                        cache: false,
                        type: 'POST', // For jQuery < 1.9
                        success: function(data){
                            // myform.pxWizard('goTo', 2);

                        },
                        error: function(xhr,status,error)  {

                        }

                    });

                    $(this).closest('.option_field').remove();
                }
            }

        });

    </script>
@endsection
