<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreatePaymentMethodRequest;
use App\Http\Requests\Admin\UpdatePaymentMethodRequest;
use App\Repositories\PaymentMethodRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PaymentMethodController extends AppBaseController
{
    /** @var  PaymentMethodRepository */
    private $paymentMethodRepository;

    public function __construct(PaymentMethodRepository $paymentMethodRepo)
    {
        $this->paymentMethodRepository = $paymentMethodRepo;
    }

    /**
     * Display a listing of the PaymentMethod.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->paymentMethodRepository->pushCriteria(new RequestCriteria($request));
        $paymentMethods = $this->paymentMethodRepository->all();

        return view('admin.payment_methods.index')->with('paymentMethods', $paymentMethods);
    }

    /**
     * Show the form for creating a new PaymentMethod.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.payment_methods.create');
    }

    /**
     * Store a newly created PaymentMethod in storage.
     *
     * @param CreatePaymentMethodRequest $request
     *
     * @return Response
     */
    public function store(CreatePaymentMethodRequest $request)
    {

        $this->validate($request,[
            'name' => 'required',
            'code' => 'required|unique:payment_methods,code'
        ]);

        $input = $request->all();

        $paymentMethod = $this->paymentMethodRepository->create($input);

        session()->flash('msg.success', 'Payment Method saved successfully.');

        return redirect(route('admin.paymentMethods.index'));
    }

    /**
     * Display the specified PaymentMethod.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $paymentMethod = $this->paymentMethodRepository->findWithoutFail($id);

        if (empty($paymentMethod)) {
            Flash::error('Payment Method not found');

            return redirect(route('admin.paymentMethods.index'));
        }

        return view('admin.payment_methods.show')->with('paymentMethod', $paymentMethod);
    }

    public function verifyCodeExist(Request $request)
    {
        $input = $request->all();
        if( count($input) > 0)
        {
            $paymentMethod = $this->paymentMethodRepository->verifyPaymentMethodCodeExist($input['code']);
            if( count($paymentMethod) > 0)
            {
                $success = 0;
                $response = 401;
            }
            else
            {
                $success = 1;
                $response = 200;
            }
        }
        else
        {
            $success = 0;
            $response = 404;
        }
        return response()->json(['success' => $success,'code' => $response]);
    }

    /**
     * Show the form for editing the specified PaymentMethod.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $paymentMethod = $this->paymentMethodRepository->findWithoutFail($id);

        if (empty($paymentMethod)) {
            Flash::error('Payment Method not found');

            return redirect(route('admin.paymentMethods.index'));
        }

        return view('admin.payment_methods.edit')->with('paymentMethod', $paymentMethod);
    }

    /**
     * Update the specified PaymentMethod in storage.
     *
     * @param  int              $id
     * @param UpdatePaymentMethodRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaymentMethodRequest $request)
    {

        $paymentMethod = $this->paymentMethodRepository->findWithoutFail($id);

        if (empty($paymentMethod)) {
            Flash::error('Payment Method not found');

            return redirect(route('admin.paymentMethods.index'));
        }

        $paymentMethod = $this->paymentMethodRepository->update($request->all(), $id);

        session()->flash('msg.success','Payment Method updated successfully.');
        // Flash::success('Payment Method updated successfully.');

        return redirect(route('admin.paymentMethods.index'));
    }

    /**
     * Remove the specified PaymentMethod from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $paymentMethod = $this->paymentMethodRepository->findWithoutFail($id);

        if (empty($paymentMethod)) {
            Flash::error('Payment Method not found');

            return redirect(route('admin.paymentMethods.index'));
        }

        $this->paymentMethodRepository->delete($id);

        session()->flash('msg.success', 'Payment method deleted successfully.');

        return redirect(route('admin.paymentMethods.index'));
    }
}
