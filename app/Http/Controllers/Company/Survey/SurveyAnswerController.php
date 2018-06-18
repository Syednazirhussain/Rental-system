<?php

namespace App\Http\Controllers\Company\Survey;

use App\Http\Requests\Company\CreateRoomRequest;
use App\Http\Requests\Company\UpdateRoomRequest;
use App\Model\Survey\CompanySurvey;
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
        $data = [
            'survey_questions' => $survey_questions,
            'survey' => $survey,
            'answer_types' => $answer_types,
        ];

        return view('company.Survey.survey_answers.index', $data);
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
