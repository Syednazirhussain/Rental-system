<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreateCurrencyRequest;
use App\Http\Requests\Company\UpdateCurrencyRequest;
use App\Repositories\Company\CurrencyRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
use App\Models\Company\Currency;

class CurrencyController extends AppBaseController
{
    /** @var  CurrencyRepository */
    private $currencyRepository;

    public function __construct(CurrencyRepository $currencyRepo)
    {
        $this->currencyRepository = $currencyRepo;
    }

    /**
     * Display a listing of the Currency.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->currencyRepository->pushCriteria(new RequestCriteria($request));

        $companyId         =   Auth::guard('company')->user()->companyUser()->first()->company_id;


        $currencies    = Currency::where('company_id',$companyId)->get();

        return view('company.currencies.index')
            ->with('currencies', $currencies);
    }

    /**
     * Show the form for creating a new Currency.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.currencies.create');
    }

    /**
     * Store a newly created Currency in storage.
     *
     * @param CreateCurrencyRequest $request
     *
     * @return Response
     */
    public function store(CreateCurrencyRequest $request)
    {
        $input = $request->all();

        $currency = $this->currencyRepository->create($input);

        if($currency)
        {
            session()->flash('msg.success','Currency successfully created');
        }

        return redirect(route('company.currencies.index'));
    }

    /**
     * Display the specified Currency.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $currency = $this->currencyRepository->findWithoutFail($id);

        if (empty($currency)) {
            Flash::error('Currency not found');

            return redirect(route('company.currencies.index'));
        }

        return view('company.currencies.show')->with('currency', $currency);
    }

    /**
     * Show the form for editing the specified Currency.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $currency = $this->currencyRepository->findWithoutFail($id);

        if (empty($currency)) 
        {
            session()->flash('msg.error','Currency not found');
            return redirect(route('company.currencies.index'));
        }

        return view('company.currencies.edit')->with('currency', $currency);
    }

    /**
     * Update the specified Currency in storage.
     *
     * @param  int              $id
     * @param UpdateCurrencyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCurrencyRequest $request)
    {
        $currency = $this->currencyRepository->findWithoutFail($id);


        if (empty($currency)) 
        {
            session()->flash('msg.error','Currency not found');
            return redirect(route('company.currencies.index'));
        }

        $currency = $this->currencyRepository->update($request->all(), $id);

        if($currency)
        {
            session()->flash('msg.success','Currency updated successfully.');
        }

        return redirect(route('company.currencies.index'));
    }

    /**
     * Remove the specified Currency from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $currency = $this->currencyRepository->findWithoutFail($id);

        if (empty($currency)) {
            Flash::error('Currency not found');

            return redirect(route('company.currencies.index'));
        }

        $this->currencyRepository->delete($id);

        Flash::success('Currency deleted successfully.');

        return redirect(route('company.currencies.index'));
    }
}
