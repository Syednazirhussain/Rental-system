<div class="row">
    <div class="col-md-12 form-group">
        <h4>Survey Name : {{ $survey->survey }}</h4>
        <h5>Feedback by {{ $feedback_by}}</h5>
    </div>
    @foreach($answers as $answer)
        <div class="col-md-12 form-group">
            <span class="feedback_question">{{ $loop->index + 1 }}.{{ $answer->topic }}</span>
        </div>
        @if($answer->answer_type == 'open_ended')
            <div class="col-md-12 form-group">
                <div class="col-md-2">
                    <span class="feedback_question">Answer :</span>
                    <input type="text" name="answer[{{ $loop->index }}][answer_type]" value="{{ $answer->answer_type }}" hidden>
                    <input type="text" name="answer[{{ $loop->index }}][id]" value="{{ $answer->id }}" hidden>
                </div>
                <div class="col-md-10">
                    <textarea rows="5" name="answer[{{ $loop->index }}][answer]" style="width: 100%;" disabled>{{ $answer->answer }}</textarea>
                </div>
            </div>
        @elseif($answer->answer_type == 'yes_no')
            <div class="col-md-12 form-group">
                <div class="col-md-2">
                    <span class="feedback_question">Answer :</span>
                    <input type="text" name="answer[{{ $loop->index }}][answer_type]" value="{{ $answer->answer_type }}" hidden>
                    <input type="text" name="answer[{{ $loop->index }}][id]" value="{{ $answer->id }}" hidden>
                </div>
                <div class="col-md-1">
                    <select id="status" name="answer[{{ $loop->index }}][answer]" class="form-control" disabled>
                        @if($answer->answer == 'yes')
                            <option value="yes">Yes</option>
                        @else
                            <option value="no">No</option>
                        @endif
                    </select>
                </div>
            </div>
        @elseif($answer->answer_type == 'rating')
            <div class="col-md-12 form-group">
                <div class="col-md-2">
                    <span class="feedback_question">Answer :</span>
                    <input type="text" name="answer[{{ $loop->index }}][answer_type]" value="{{ $answer->answer_type }}" hidden>
                    <input type="text" name="answer[{{ $loop->index }}][id]" value="{{ $answer->id }}" hidden>
                </div>
                <div class="col-md-4">
                    <div class="star-rating">
                        <span class="fa fa-star-o" data-rating="1"></span>
                        <span class="fa fa-star-o" data-rating="2"></span>
                        <span class="fa fa-star-o" data-rating="3"></span>
                        <span class="fa fa-star-o" data-rating="4"></span>
                        <span class="fa fa-star-o" data-rating="5"></span>
                        <input type="hidden" name="answer[{{ $loop->index }}][answer]" class="rating-value" value="{{ $answer->answer }}">
                    </div>
                </div>
            </div>
        @elseif($answer->answer_type == 'optional')
            <div class="col-md-12 form-group">
                <div class="col-md-2">
                    <span class="feedback_question">Answer :</span>
                    <input type="text" name="answer[{{ $loop->index }}][answer_type]" value="{{ $answer->answer_type }}" hidden>
                    <input type="text" name="answer[{{ $loop->index }}][id]" value="{{ $answer->id }}" hidden>
                </div>
                <div class="col-md-4">
                    <select id="optional_answer" name="answer[{{ $loop->index }}][answer]" class="form-control" disabled>
                        @foreach($options as $option)
                            @if($option->question_id == $answer->id)
                                <option value="{{ $option->code }}">{{ $option->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        @endif
    @endforeach
    <div class="col-md-12">
        <a href="{!! route('company.survey_answers.list') !!}" class="btn btn-default">Back</a>
    </div>
</div>


@section('js')
    <script type="text/javascript">

        var $star_rating = $('.star-rating .fa');

        var SetRatingStar = function() {
            return $star_rating.each(function() {
                if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
                    return $(this).removeClass('fa-star-o').addClass('fa-star');
                } else {
                    return $(this).removeClass('fa-star').addClass('fa-star-o');
                }
            });
        };

        SetRatingStar();
    </script>
@endsection