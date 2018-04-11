<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateDiscountTypeRequest;
use App\Http\Requests\Admin\UpdateDiscountTypeRequest;
use App\Repositories\DiscountTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DiscountTypeController extends AppBaseController
{
    /** @var  DiscountTypeRepository */
    private $discountTypeRepository;

    public function __construct(DiscountTypeRepository $discountTypeRepo)
    {
        $this->discountTypeRepository = $discountTypeRepo;
    }

    /**
     * Display a listing of the DiscountType.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->discountTypeRepository->pushCriteria(new RequestCriteria($request));
        $discountTypes = $this->discountTypeRepository->all();

        return view('admin.discount_types.index')
            ->with('discountTypes', $discountTypes);
    }

    /**
     * Show the form for creating a new DiscountType.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.discount_types.create');
    }

    /**
     * Store a newly created DiscountType in storage.
     *
     * @param CreateDiscountTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateDiscountTypeRequest $request)
    {
        $input = $request->all();

        $discountType = $this->discountTypeRepository->create($input);

        Flash::success('Discount Type saved successfully.');

        return redirect(route('admin.discountTypes.index'));
    }

    /**
     * Display the specified DiscountType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $discountType = $this->discountTypeRepository->findWithoutFail($id);

        if (empty($discountType)) {
            Flash::error('Discount Type not found');

            return redirect(route('admin.discountTypes.index'));
        }

        return view('admin.discount_types.show')->with('discountType', $discountType);
    }

    /**
     * Show the form for editing the specified DiscountType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $discountType = $this->discountTypeRepository->findWithoutFail($id);

        if (empty($discountType)) {
            Flash::error('Discount Type not found');

            return redirect(route('admin.discountTypes.index'));
        }

        return view('admin.discount_types.edit')->with('discountType', $discountType);
    }

    /**
     * Update the specified DiscountType in storage.
     *
     * @param  int              $id
     * @param UpdateDiscountTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDiscountTypeRequest $request)
    {
        $discountType = $this->discountTypeRepository->findWithoutFail($id);

        if (empty($discountType)) {
            Flash::error('Discount Type not found');

            return redirect(route('admin.discountTypes.index'));
        }

        $discountType = $this->discountTypeRepository->update($request->all(), $id);

        Flash::success('Discount Type updated successfully.');

        return redirect(route('admin.discountTypes.index'));
    }

    /**
     * Remove the specified DiscountType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $discountType = $this->discountTypeRepository->findWithoutFail($id);

        if (empty($discountType)) {
            Flash::error('Discount Type not found');

            return redirect(route('admin.discountTypes.index'));
        }

        $this->discountTypeRepository->delete($id);

        Flash::success('Discount Type deleted successfully.');

        return redirect(route('admin.discountTypes.index'));
    }
}
