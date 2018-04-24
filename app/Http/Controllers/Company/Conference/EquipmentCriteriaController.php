<?php

namespace App\Http\Controllers\Company\Conference;

use App\Http\Requests\Company\Conference\CreateEquipmentCriteriaRequest;
use App\Http\Requests\Company\Conference\UpdateEquipmentCriteriaRequest;
use App\Repositories\EquipmentCriteriaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Session;

class EquipmentCriteriaController extends AppBaseController
{
    /** @var  EquipmentCriteriaRepository */
    private $equipmentCriteriaRepository;

    public function __construct(EquipmentCriteriaRepository $equipmentCriteriaRepo)
    {
        $this->equipmentCriteriaRepository = $equipmentCriteriaRepo;
    }

    /**
     * Display a listing of the EquipmentCriteria.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->equipmentCriteriaRepository->pushCriteria(new RequestCriteria($request));
        $equipmentCriterias = $this->equipmentCriteriaRepository->all();

        return view('company.Conference.equipment_criterias.index')
            ->with('equipmentCriterias', $equipmentCriterias);
    }

    /**
     * Show the form for creating a new EquipmentCriteria.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.Conference.equipment_criterias.create');
    }

    /**
     * Store a newly created EquipmentCriteria in storage.
     *
     * @param CreateEquipmentCriteriaRequest $request
     *
     * @return Response
     */
    public function store(CreateEquipmentCriteriaRequest $request)
    {

        
        $input = $request->all();


        if ( preg_match('/\s/',$input['title']) ) {

            $input['code'] = strtolower(str_replace(' ', '-', $input['title']));
            $code = $input['code'];
            
        } else {
            $input['code'] = strtolower($input['title']);
            $code = $input['code'];
        }

        $checkCodeDuplication = $this->equipmentCriteriaRepository->checkCodeDuplication($code);



        if ($checkCodeDuplication > 0) {

            Session::flash("errorMessage", "The Equipment Criteria ".$input['title']." already Exist.");
            return view('company.Conference.equipment_criterias.create');

        } else {

            $equipmentCriteria = $this->equipmentCriteriaRepository->create($input);

            Session::flash("successMessage", "The Equipment Criteria has been added successfully.");

            return redirect(route('company.conference.equipmentCriterias.index'));
        }



    }

    /**
     * Display the specified EquipmentCriteria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $equipmentCriteria = $this->equipmentCriteriaRepository->findWithoutFail($id);

        if (empty($equipmentCriteria)) {
            Flash::error('Equipment Criteria not found');

            return redirect(route('company.conference.equipmentCriterias.index'));
        }

        return view('company.Conference.equipment_criterias.show')->with('equipmentCriteria', $equipmentCriteria);
    }

    /**
     * Show the form for editing the specified EquipmentCriteria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $equipmentCriteria = $this->equipmentCriteriaRepository->findWithoutFail($id);

        if (empty($equipmentCriteria)) {
            Flash::error('Equipment Criteria not found');

            return redirect(route('company.conference.equipmentCriterias.index'));
        }

        return view('company.Conference.equipment_criterias.edit')->with('equipmentCriteria', $equipmentCriteria);
    }

    /**
     * Update the specified EquipmentCriteria in storage.
     *
     * @param  int              $id
     * @param UpdateEquipmentCriteriaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEquipmentCriteriaRequest $request)
    {
        $equipmentCriteria = $this->equipmentCriteriaRepository->findWithoutFail($id);

        if (empty($equipmentCriteria)) {
            Flash::error('Equipment Criteria not found');

            return redirect(route('company.conference.equipmentCriterias.index'));
        }

        $equipmentCriteria = $this->equipmentCriteriaRepository->update($request->all(), $id);

        Session::flash("successMessage", "The Equipment Criteria has been updated successfully.");

        return redirect(route('company.conference.equipmentCriterias.index'));
    }

    /**
     * Remove the specified EquipmentCriteria from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $equipmentCriteria = $this->equipmentCriteriaRepository->findWithoutFail($id);

        if (empty($equipmentCriteria)) {
            Flash::error('Equipment Criteria not found');

            return redirect(route('company.conference.equipmentCriterias.index'));
        }

        $this->equipmentCriteriaRepository->delete($id);

        Session::flash("deleteMessage", "The Equipment Criteria has been deleted successfully.");

        return redirect(route('company.conference.equipmentCriterias.index'));
    }
}
