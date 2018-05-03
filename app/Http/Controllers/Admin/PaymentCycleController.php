<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreatePaymentCycleRequest;
use App\Http\Requests\Admin\UpdatePaymentCycleRequest;
use App\Repositories\PaymentCycleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PaymentCycleController extends AppBaseController
{
    /** @var  PaymentCycleRepository */
    private $paymentCycleRepository;

    public function __construct(PaymentCycleRepository $paymentCycleRepo)
    {
        $this->paymentCycleRepository = $paymentCycleRepo;
    }

    /**
     * Display a listing of the PaymentCycle.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->paymentCycleRepository->pushCriteria(new RequestCriteria($request));
        $paymentCycles = $this->paymentCycleRepository->all();

        return view('admin.payment_cycles.index')->with('paymentCycles', $paymentCycles);

    }

    /**
     * Show the form for creating a new PaymentCycle.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.payment_cycles.create');
    }

    /**
     * Store a newly created PaymentCycle in storage.
     *
     * @param CreatePaymentCycleRequest $request
     *
     * @return Response
     */
    public function store(CreatePaymentCycleRequest $request)
    {

        $this->validate($request,[
            'name' => 'required|alpha'
        ]);

        $input = $request->all();

        $paymentCycle = $this->paymentCycleRepository->create($input);

        Flash::success('Payment Cycle saved successfully.');

        return redirect(route('admin.paymentCycles.index'));
    }

    /**
     * Display the specified PaymentCycle.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $paymentCycle = $this->paymentCycleRepository->findWithoutFail($id);

        if (empty($paymentCycle)) {
            Flash::error('Payment Cycle not found');

            return redirect(route('admin.paymentCycles.index'));
        }

        return view('admin.payment_cycles.show')->with('paymentCycle', $paymentCycle);
    }

    /**
     * Show the form for editing the specified PaymentCycle.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $paymentCycle = $this->paymentCycleRepository->findWithoutFail($id);

        if (empty($paymentCycle)) {
            Flash::error('Payment Cycle not found');

            return redirect(route('admin.paymentCycles.index'));
        }

        return view('admin.payment_cycles.edit')->with('paymentCycle', $paymentCycle);
    }

    /**
     * Update the specified PaymentCycle in storage.
     *
     * @param  int              $id
     * @param UpdatePaymentCycleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaymentCycleRequest $request)
    {

        $this->validate($request,[
            'name' => 'required|alpha'
        ]);

        $paymentCycle = $this->paymentCycleRepository->findWithoutFail($id);

        if (empty($paymentCycle)) {
            Flash::error('Payment Cycle not found');

            return redirect(route('admin.paymentCycles.index'));
        }

        $paymentCycle = $this->paymentCycleRepository->update($request->all(), $id);

        Flash::success('Payment Cycle updated successfully.');

        return redirect(route('admin.paymentCycles.index'));
    }

    /**
     * Remove the specified PaymentCycle from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $paymentCycle = $this->paymentCycleRepository->findWithoutFail($id);

        if (empty($paymentCycle)) {
            Flash::error('Payment Cycle not found');

            return redirect(route('admin.paymentCycles.index'));
        }

        $this->paymentCycleRepository->delete($id);

        Flash::success('Payment Cycle deleted successfully.');

        return redirect(route('admin.paymentCycles.index'));
    }
}
