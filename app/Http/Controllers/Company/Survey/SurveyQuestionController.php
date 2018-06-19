<?php

namespace App\Http\Controllers\Company\Survey;

use App\Http\Requests\Company\CreateRoomRequest;
use App\Http\Requests\Company\UpdateRoomRequest;
use App\Model\Survey\CompanySurvey;
use App\Model\Survey\SurveyQuestion;
use App\Model\Survey\QuestionOption;
use App\Models\CompanyService;
use App\Models\Survey\AnswerType;
use App\Repositories\Company\RoomRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Survey\SurveyCategory;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
use App\Models\Company;


class SurveyQuestionController extends AppBaseController
{
    /** @var  RoomRepository */
    private $roomRepository;

    public function __construct(RoomRepository $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    /**
     * Display a listing of the Survey Category.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $survey_questions = SurveyQuestion::where('company_id', $company_id)->get();
        $surveys = CompanySurvey::where('company_id', $company_id)->pluck('survey', 'id');
        $answer_types = AnswerType::pluck('name', 'code');
        $data = [
            'survey_questions' => $survey_questions,
            'surveys' => $surveys,
            'answer_types' => $answer_types,
        ];

        return view('company.Survey.survey_questions.index', $data);
    }

    /**
     * Show the form for creating a new AnswerType.
     *
     * @return Response
     */
    public function create()
    {
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $answer_types = AnswerType::all();
        $surveys = CompanySurvey::where('company_id', $company_id)->get();
        $company_name = Company::find($company_id)->name;

        $data = [
            'company_id' => $company_id,
            'company_name' => $company_name,
            'answer_types' => $answer_types,
            'surveys' => $surveys
        ];

        return view('company.Survey.survey_questions.create', $data);
    }

    /**
     * Store a newly created AnswerType in storage.
     *
     * @param CreateRoomRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $input = $request->all();
        $input['company_id'] = $company_id;
        $survey_question = SurveyQuestion::create($input);

        $options_data = [];
        $i = 0;
        if(isset($input['option'])) {
            foreach($input['option'] as $option) {
                $options_data[$i]['company_id'] = $company_id;
                $options_data[$i]['survey_id'] = $input['survey_id'];
                $options_data[$i]['question_id'] = $survey_question->id;
                $options_data[$i]['name'] = $option['name'];
                $options_data[$i]['code'] = $option['code'];
                $i++;
            }

            QuestionOption::insert($options_data);
        }

        if($survey_question) {
            $request->session()->flash('msg.success', 'Survey Question created successfully !');
        }

        return redirect(route('company.survey_question.index'));
    }

    /**
     * Display the specified AnswerType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified AnswerType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $answer_types = AnswerType::all();
        $surveys = CompanySurvey::where('company_id', $company_id)->get();
        $company_name = Company::find($company_id)->name;
        $question = SurveyQuestion::find($id);
        $options = QuestionOption::where('company_id', $company_id)->where('question_id', $id)->get();

        $data = [
            'company_id' => $company_id,
            'company_name' => $company_name,
            'answer_types' => $answer_types,
            'surveys' => $surveys,
            'question' => $question,
            'options' => $options
        ];

        return view('company.Survey.survey_questions.edit', $data);
    }

    /**
     * Update the specified AnswerType in storage.
     *
     * @param  int              $id
     * @param UpdateRoomRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $input = $request->all();
        if(isset($input['option'])) {
            $options = $input['option'];
        }

        $question = SurveyQuestion::find($id);
        $input = $request->except('_method', '_token', 'option');
        $input['company_id'] = $company_id;

        if($question) {
            SurveyQuestion::where('id', $id)->update($input);
        }

        if(isset($options)) {
            $option_data = [];

            foreach($options as $option) {
                $option_data['company_id'] = $company_id;
                $option_data['survey_id'] = $input['survey_id'];
                $option_data['question_id'] = $question->id;
                $option_data['name'] = $option['name'];
                $option_data['code'] = $option['code'];

                if (strpos($option['pk'], 'new-') === false) {
                    $id = $option['pk'];
                } else {
                    $id = "";
                }

                $where = ['id' => $id];
                QuestionOption::updateOrCreate($where, $option_data);
            }
        }

        if($question) {
            $request->session()->flash('msg.success', 'Survey Question updated successfully !');
        }

        return redirect(route('company.survey_question.index'));
    }

    /**
     * Remove the specified AnswerType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id, Request $request)
    {

    }
}
