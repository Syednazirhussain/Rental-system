<?php

namespace App\Http\Controllers\Company\Conference;

use App\Http\Requests\Company\Conference\CreateEquipmentsRequest;
use App\Http\Requests\Company\Conference\UpdateEquipmentsRequest;
use App\Repositories\EquipmentsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EquipmentsController extends AppBaseController
{
    /** @var  EquipmentsRepository */
    private $equipmentsRepository;

    public function __construct(EquipmentsRepository $equipmentsRepo)
    {
        $this->equipmentsRepository = $equipmentsRepo;
    }

    /**
     * Display a listing of the Equipments.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->equipmentsRepository->pushCriteria(new RequestCriteria($request));
        $equipments = $this->equipmentsRepository->all();

        return view('company.Conference.equipments.index')
            ->with('equipments', $equipments);
    }

    /**
     * Show the form for creating a new Equipments.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.Conference.equipments.create');
    }

    /**
     * Store a newly created Equipments in storage.
     *
     * @param CreateEquipmentsRequest $request
     *
     * @return Response
     */
    public function store(CreateEquipmentsRequest $request)
    {
        $input = $request->all();

        $equipments = $this->equipmentsRepository->create($input);

        Flash::success('Equipments saved successfully.');

        return redirect(route('company.conference.equipments.index'));
    }

    /**
     * Display the specified Equipments.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $equipments = $this->equipmentsRepository->findWithoutFail($id);

        if (empty($equipments)) {
            Flash::error('Equipments not found');

            return redirect(route('company.conference.equipments.index'));
        }

        return view('company.Conference.equipments.show')->with('equipments', $equipments);
    }

    /**
     * Show the form for editing the specified Equipments.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $equipments = $this->equipmentsRepository->findWithoutFail($id);

        if (empty($equipments)) {
            Flash::error('Equipments not found');

            return redirect(route('company.conference.equipments.index'));
        }

        return view('company.Conference.equipments.edit')->with('equipments', $equipments);
    }

    /**
     * Update the specified Equipments in storage.
     *
     * @param  int              $id
     * @param UpdateEquipmentsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEquipmentsRequest $request)
    {
        $equipments = $this->equipmentsRepository->findWithoutFail($id);

        if (empty($equipments)) {
            Flash::error('Equipments not found');

            return redirect(route('company.conference.equipments.index'));
        }

        $equipments = $this->equipmentsRepository->update($request->all(), $id);

        Flash::success('Equipments updated successfully.');

        return redirect(route('company.conference.equipments.index'));
    }

    /**
     * Remove the specified Equipments from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $equipments = $this->equipmentsRepository->findWithoutFail($id);

        if (empty($equipments)) {
            Flash::error('Equipments not found');

            return redirect(route('company.conference.equipments.index'));
        }

        $this->equipmentsRepository->delete($id);

        Flash::success('Equipments deleted successfully.');

        return redirect(route('company.conference.equipments.index'));
    }
}
