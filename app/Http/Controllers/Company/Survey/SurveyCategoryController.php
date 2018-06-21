<?php

namespace App\Http\Controllers\Company\Survey;

use App\Http\Requests\Company\CreateRoomRequest;
use App\Http\Requests\Company\UpdateRoomRequest;
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


class SurveyCategoryController extends AppBaseController
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
        $categories = SurveyCategory::all();
        $data = [
            'categories' => $categories
        ];

        return view('company.Survey.category.index', $data);
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
    public function store(CreateRoomRequest $request)
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
