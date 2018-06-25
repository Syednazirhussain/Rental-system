<?php

namespace App\Http\Controllers\Company\Survey;

use App\Http\Requests\Company\CreateRoomRequest;
use App\Http\Requests\Company\UpdateRoomRequest;
use App\Model\Survey\CompanySurvey;
use App\Model\Survey\QuestionOption;
use App\Model\Survey\SurveyAnswer;
use App\Model\Survey\SurveyQuestion;
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
use App\Models\User;


class SurveyAnswerController extends AppBaseController
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
        $survey = CompanySurvey::where('category_code', 'rental_module')->first();
        $survey_questions = SurveyQuestion::where('company_id', $company_id)->where('survey_id', $survey->id)->get();
        $answer_types = AnswerType::pluck('name', 'code');
        $options = QuestionOption::where('company_id', $company_id)->where('survey_id', $survey->id)->get();
        $data = [
            'survey_questions' => $survey_questions,
            'survey' => $survey,
            'answer_types' => $answer_types,
            'options' => $options
        ];

        return view('company.Survey.survey_answers.index', $data);
    }

    /**
     * Display a listing of the Survey Category.
     *
     * @param Request $request
     * @return Response
     */
    public function lists(Request $request)
    {
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $answer_types = AnswerType::pluck('name', 'code');
        $categories = SurveyCategory::pluck('name', 'code');
        $survey_answers = SurveyAnswer::join('company_surveys', 'survey_id', '=', 'company_surveys.id')
            ->join('users', 'user_id', '=', 'users.id')
            ->where('survey_answers.company_id', $company_id)
            ->select('survey_answers.*', 'company_surveys.*', 'users.name')
            ->groupby('survey_answers.user_id')->get();

        $data = [
            'survey_answers' => $survey_answers,
            'answer_types' => $answer_types,
            'categories' => $categories,
        ];

        return view('company.Survey.survey_answers.list', $data);
    }

    /**
     * Show the form for creating a new AnswerType.
     *
     * @return Response
     */
    public function create()
    {

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
        $user_id = Auth::guard('company')->user()->id;
        $input = $request->all();

        $data = [];

        foreach($input['answer'] as $answer) {
            $data['user_id'] = $user_id;
            $data['company_id'] = $company_id;
            $data['survey_id'] = $input['survey_id'];
            $data['question_id'] = $answer['id'];
            $data['answer_type'] = $answer['answer_type'];
            $data['answer'] = $answer['answer'];

            $survey_answer = SurveyAnswer::insert($data);
        }

        if($survey_answer) {
            $request->session()->flash('msg.success', 'Survey Answer created successfully !');
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
    public function show($survey_id, $user_id)
    {
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $survey = CompanySurvey::find($survey_id);
        $survey_questions = SurveyQuestion::where('company_id', $company_id)->where('survey_id', $survey->id)->get();
        $answer_types = AnswerType::pluck('name', 'code');
        $options = QuestionOption::where('company_id', $company_id)->where('survey_id', $survey->id)->get();
        $answers = SurveyAnswer::join('survey_questions', 'question_id', '=', 'survey_questions.id')
            ->where('survey_questions.company_id', $company_id)
            ->where('survey_answers.user_id', $user_id)
            ->get();
        $feedback_by = User::find($user_id)->name;

        $data = [
            'survey_questions' => $survey_questions,
            'survey' => $survey,
            'answer_types' => $answer_types,
            'options' => $options,
            'answers' => $answers,
            'feedback_by' => $feedback_by,

        ];

        return view('company.Survey.survey_answers.show', $data);
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

    }

    /**
     * Update the specified AnswerType in storage.
     *
     * @param  int              $id
     * @param UpdateRoomRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoomRequest $request)
    {

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
