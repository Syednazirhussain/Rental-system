<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="row">
    <div class="col-md-12 form-group">
        <h4>{{ $survey->survey }}</h4>
    </div>
    @foreach($survey_questions as $question)
        <div class="col-md-12 form-group">
            <span class="feedback_question">{{ $loop->index + 1 }}.{{ $question->topic }}</span>
        </div>
        @if($question->answer_type == 'open_ended')
            <div class="col-md-12 form-group">
                <div class="col-md-2">
                    <span class="feedback_question">Answer :</span>
                </div>
                <div class="col-md-10">
                    <textarea rows="5" style="width: 100%;"></textarea>
                </div>
            </div>
        @elseif($question->answer_type == 'yes_no')
            <div class="col-md-12 form-group">
                <div class="col-md-2">
                    <span class="feedback_question">Answer :</span>
                </div>
                <div class="col-md-1">
                    <select id="status" name="status" class="form-control">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
            </div>
        @elseif($question->answer_type == 'rating')
            <div class="col-md-12 form-group">
                <div class="col-md-2">
                    <span class="feedback_question">Answer :</span>
                </div>
                <div class="col-md-4">
                    <div class="star-rating">
                        <span class="fa fa-star-o" data-rating="1"></span>
                        <span class="fa fa-star-o" data-rating="2"></span>
                        <span class="fa fa-star-o" data-rating="3"></span>
                        <span class="fa fa-star-o" data-rating="4"></span>
                        <span class="fa fa-star-o" data-rating="5"></span>
                        <input type="hidden" name="whatever1" class="rating-value" value="0">
                    </div>
                </div>
            </div>
        @endif
    @endforeach
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
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

        $star_rating.on('click', function() {
            $star_rating.siblings('input.rating-value').val($(this).data('rating'));
            return SetRatingStar();
        });

        SetRatingStar();
    </script>
@endsection
