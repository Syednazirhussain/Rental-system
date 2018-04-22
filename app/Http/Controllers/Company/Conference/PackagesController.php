<?php

namespace App\Http\Controllers\Company\Conference;

use App\Http\Requests\Company\Conference\CreatePackagesRequest;
use App\Http\Requests\Company\Conference\UpdatePackagesRequest;
use App\Repositories\PackagesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PackagesController extends AppBaseController
{
    /** @var  PackagesRepository */
    private $packagesRepository;

    public function __construct(PackagesRepository $packagesRepo)
    {
        $this->packagesRepository = $packagesRepo;
    }

    /**
     * Display a listing of the Packages.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->packagesRepository->pushCriteria(new RequestCriteria($request));
        $packages = $this->packagesRepository->all();

        return view('company.Conference.packages.index')
            ->with('packages', $packages);
    }

    /**
     * Show the form for creating a new Packages.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.Conference.packages.create');
    }

    /**
     * Store a newly created Packages in storage.
     *
     * @param CreatePackagesRequest $request
     *
     * @return Response
     */
    public function store(CreatePackagesRequest $request)
    {
        $input = $request->all();

        $packages = $this->packagesRepository->create($input);

        Flash::success('Packages saved successfully.');

        return redirect(route('company.conference.packages.index'));
    }

    /**
     * Display the specified Packages.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $packages = $this->packagesRepository->findWithoutFail($id);

        if (empty($packages)) {
            Flash::error('Packages not found');

            return redirect(route('company.conference.packages.index'));
        }

        return view('company.Conference.packages.show')->with('packages', $packages);
    }

    /**
     * Show the form for editing the specified Packages.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $packages = $this->packagesRepository->findWithoutFail($id);

        if (empty($packages)) {
            Flash::error('Packages not found');

            return redirect(route('company.conference.packages.index'));
        }

        return view('company.Conference.packages.edit')->with('packages', $packages);
    }

    /**
     * Update the specified Packages in storage.
     *
     * @param  int              $id
     * @param UpdatePackagesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePackagesRequest $request)
    {
        $packages = $this->packagesRepository->findWithoutFail($id);

        if (empty($packages)) {
            Flash::error('Packages not found');

            return redirect(route('company.conference.packages.index'));
        }

        $packages = $this->packagesRepository->update($request->all(), $id);

        Flash::success('Packages updated successfully.');

        return redirect(route('company.conference.packages.index'));
    }

    /**
     * Remove the specified Packages from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $packages = $this->packagesRepository->findWithoutFail($id);

        if (empty($packages)) {
            Flash::error('Packages not found');

            return redirect(route('company.conference.packages.index'));
        }

        $this->packagesRepository->delete($id);

        Flash::success('Packages deleted successfully.');

        return redirect(route('company.conference.packages.index'));
    }
}
