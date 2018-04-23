<?php

namespace App\Http\Controllers\Company\Conference;

use App\Http\Requests\Company\Conference\CreatePackagesRequest;
use App\Http\Requests\Company\Conference\UpdatePackagesRequest;
use App\Repositories\PackagesRepository;
use App\Repositories\FoodRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Session;

class PackagesController extends AppBaseController
{
    /** @var  PackagesRepository */
    private $packagesRepository;
    private $foodRepository;

    public function __construct(PackagesRepository $packagesRepo,
                                FoodRepository $foodRepo
    )
    {
        $this->packagesRepository = $packagesRepo;
        $this->foodRepository = $foodRepo;
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
        $getFoodItems = $this->foodRepository->getFoodItems();


        $data = [
                    'getFoodItems' => $getFoodItems
                ];

        return view('company.Conference.packages.create', $data);
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

        $input['items'] = json_encode($input['items']);

        $packages = $this->packagesRepository->create($input);

        Session::flash("successMessage", "The Package has been added successfully.");

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
        $getFoodItems = $this->foodRepository->getFoodItems();


        $pieces = explode(",", $packages->items);

        $pieces = str_replace('"', '', $pieces);
        $pieces = str_replace(']', '', $pieces);
        $pieces = str_replace('[', '', $pieces);


        if (empty($packages)) {
            Flash::error('Packages not found');

            return redirect(route('company.conference.packages.index'));
        }

        // dd($pieces);

        $data = [
                    'getFoodItems' => $getFoodItems,
                    'packages'=> $packages,
                    'pieces' => $pieces
                ];


        return view('company.Conference.packages.edit', $data);
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

        
        $request['items'] = json_encode($request['items']);



        $packages = $this->packagesRepository->update($request->all(), $id);

        Session::flash("successMessage", "The Package has been updated successfully.");

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

        Session::flash("deleteMessage", "The Package has been deleted successfully.");

        return redirect(route('company.conference.packages.index'));
    }
}
