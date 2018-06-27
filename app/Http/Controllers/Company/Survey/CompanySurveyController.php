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


class CompanySurveyController extends AppBaseController
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
        $surveys = CompanySurvey::where('company_id', $company_id)->get();
        $survey_categories = SurveyCategory::pluck('name', 'code');

        $data = [
            'surveys' => $surveys,
            'survey_categories' => $survey_categories,
        ];

        return view('company.Survey.survey.index', $data);
    }

    /**
     * Show the form for creating a new AnswerType.
     *
     * @return Response
     */
    public function create()
    {
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $survey_categories = SurveyCategory::all();
        $company_name = Company::find($company_id)->name;

        $data = [
            'company_id' => $company_id,
            'company_name' => $company_name,
            'categories' => $survey_categories,
        ];

        return view('company.Survey.survey.create', $data);
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

        $survey = CompanySurvey::create($input);

        if($survey) {
            $request->session()->flash('msg.success', 'Company Survey created successfully !');
        }

        return redirect(route('company.survey.index'));
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
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $surveys = CompanySurvey::find($id);
        $survey_questions = SurveyQuestion::where('company_id', $company_id)->where('survey_id', $id)->get();
        $answer_types = AnswerType::pluck('name', 'code');
        $data = [
            'survey_questions' => $survey_questions,
            'surveys' => $surveys,
            'answer_types' => $answer_types,
        ];

        return view('company.Survey.survey_questions.index', $data);
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
        $survey_categories = SurveyCategory::all();
        $company_name = Company::find($company_id)->name;
        $survey = CompanySurvey::find($id);

        $data = [
            'company_id' => $company_id,
            'company_name' => $company_name,
            'categories' => $survey_categories,
            'survey' => $survey,
        ];

        return view('company.Survey.survey.edit', $data);
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
        $input['company_id'] = $company_id;

        $survey = CompanySurvey::find($id);

        if($survey) {
            $survey->update($input);
            $request->session()->flash('msg.success', 'Company Survey updated successfully !');
        }

        return redirect(route('company.survey.index'));
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
        $survey = CompanySurvey::find($id);

        if (empty($survey)) {
            $request->session()->flash('msg.success', 'Company Survey not found.');

            return redirect(route('company.survey.index'));
        }

        $survey->delete();

        $request->session()->flash('msg.success', 'Company Service deleted successfully.');

        return redirect(route('company.survey.index'));
    }

    /* *
     * Dashboard Data and Graph
     * */

    public function dashboard($id)
    {
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $surveys = CompanySurvey::find($id);
        $answer_types = AnswerType::pluck('name', 'code');
        $answers = SurveyAnswer::join('survey_questions', 'question_id', '=', 'survey_questions.id')
            ->join('users', 'survey_answers.user_id', '=', 'users.id')
            ->select('survey_answers.*', 'survey_questions.*', 'users.name')
            ->where('survey_questions.company_id', $company_id)
            ->where('survey_questions.survey_id', $id)->get();;
        $options = QuestionOption::where('company_id', $company_id)->where('survey_id', $id)->pluck('name', 'code');
        $questions = SurveyQuestion::where('company_id', $company_id)->where('survey_id', $id)->get();

        $statistic = [];
        $st_count = 0;
        foreach($questions as $question) {
            if($question->answer_type == 'yes_no') {
                $yes_count = SurveyAnswer::where('question_id', $question->id)->where('answer_type', 'yes_no')->where('answer', 'yes')->count();
                $no_count = SurveyAnswer::where('question_id', $question->id)->where('answer_type', 'yes_no')->where('answer', 'no')->count();
                $st_count += 1;
                array_push($statistic, (Object) array('answer_type' => 'yes_no', 'yes' => $yes_count, 'no' => $no_count, 'title' => $question->topic));
            }else if ($question->answer_type == 'rating') {
                $sAnswer = SurveyAnswer::where('question_id', $question->id)->where('answer_type', 'rating')->get();
                $count = SurveyAnswer::where('question_id', $question->id)->where('answer_type', 'rating')->count();;
                $rating = 0;
                foreach($sAnswer as $answer) {
                    $rating += $answer->answer;
                }

                if($count > 0) {
                    $rating = $rating/$count;
                }
                $st_count += 1;
                array_push($statistic, (Object) array('answer_type' => 'rating', 'rating' => $rating, 'title' => $question->topic));
            }else if ($question->answer_type == 'optional') {
                $q_options = QuestionOption::where('question_id', $question->id)->get();
                $q_answer = [];
                foreach($q_options as $option) {
                    $count = SurveyAnswer::where('question_id', $question->id)->where('answer_type', 'optional')->where('answer', $option->code)->count();
                    array_push($q_answer, (Object) array('option' => $option->name, 'count' => $count));
                }
                $st_count += 1;
                array_push($statistic, (Object) array('answer_type' => 'optional', 'data' => $q_answer, 'title' => $question->topic));
            }
        }

        $data = [
            'surveys' => $surveys,
            'answer_types' => $answer_types,
            'answers' => $answers,
            'options' => $options,
            'statistic' => json_encode($statistic),
            'count' => $st_count
        ];

        return view('company.Survey.survey.dashboard', $data);
    }
}
