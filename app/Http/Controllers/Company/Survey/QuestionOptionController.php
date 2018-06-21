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


class QuestionOptionController extends AppBaseController
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
    public function update($id, Request $request)
    {

    }

    /**
     * Remove the specified AnswerType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy( Request $request)
    {
        $id = $request->only('option_id');

        $id = $id['option_id'];


        $option = QuestionOption::find($id);

        if (empty($option)) {

            $success = 0;
            $msg = "Question Option not found";
        }else {
            $option->delete();
            $success = 1;
            $msg = "Question Option deleted successfully";
        }

        return response()->json([
            'success'=>$success,
            'msg'=>$msg,
        ]);
    }
}
