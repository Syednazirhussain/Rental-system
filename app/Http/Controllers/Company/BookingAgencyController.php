<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreateBookingAgencyRequest;
use App\Http\Requests\Company\UpdateBookingAgencyRequest;
use App\Repositories\BookingAgencyRepository;
use App\Repositories\CompanyRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use Auth;

use App\Models\Company;

class BookingAgencyController extends AppBaseController
{
    /** @var  BookingAgencyRepository */
    private $bookingAgencyRepository;
    private $CompanyRepository;

    public function __construct(BookingAgencyRepository $bookingAgencyRepo,
                                  CompanyRepository $companyRepo
                                )
    {
        $this->bookingAgencyRepository = $bookingAgencyRepo;
        $this->CompanyRepository = $companyRepo;
    }

    /**
     * Display a listing of the BookingAgency.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->bookingAgencyRepository->pushCriteria(new RequestCriteria($request));
        $bookingAgencies = $this->bookingAgencyRepository->all();

        return view('company.booking_agencies.index')
            ->with('bookingAgencies', $bookingAgencies);
    }

    /**
     * Show the form for creating a new BookingAgency.
     *
     * @return Response
     */
    public function create()
    {
        $company =  $this->CompanyRepository->all();


        $data = [
            'company' => $company
        ];

        // dd($data);->with('companyBuildings',$companyBuildings)
        return view('company.booking_agencies.create',$data);
    }

    /**
     * Store a newly created BookingAgency in storage.
     *
     * @param CreateBookingAgencyRequest $request
     *
     * @return Response
     */
    public function store(CreateBookingAgencyRequest $request)
    {

        $this->validate($request,[
                    'company_id'        =>  'required',
                    'name'              =>  'required|max:20|min:3',
                    'contact_person'    =>  'required|max:20|min:3',
                    'phone'             =>  'required|max:20|min:8',
                    'mobile'            =>  'required|max:20|min:8',
                    'fax'               =>  'required|max:20|min:8',
                    'kick_back_fnb'     =>  'required',
                    'kick_back_room'    =>  'required',
                    'buildings'         =>  'required|max:200|min:5'

                ]);

        $input = $request->all();

        $bookingAgency = $this->bookingAgencyRepository->create($input);

        Flash::success('Booking Agency saved successfully.');

        return redirect(route('company.bookingAgencies.index'));
    }

    /**
     * Display the specified BookingAgency.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bookingAgency = $this->bookingAgencyRepository->findWithoutFail($id);

        if (empty($bookingAgency)) {
            Flash::error('Booking Agency not found');

            return redirect(route('company.bookingAgencies.index'));
        }

        return view('company.booking_agencies.show')->with('bookingAgency', $bookingAgency);
    }

    /**
     * Show the form for editing the specified BookingAgency.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bookingAgency = $this->bookingAgencyRepository->findWithoutFail($id);
        $company =  $this->CompanyRepository->all();

        $data = [
            'company'       =>  $company,
            'bookingAgency' =>  $bookingAgency
        ];

        //dd($data);

        if (empty($bookingAgency)) {
            Flash::error('Booking Agency not found');

            return redirect(route('company.bookingAgencies.index'));
        }

        return view('company.booking_agencies.edit', $data);
    }

    /**
     * Update the specified BookingAgency in storage.
     *
     * @param  int              $id
     * @param UpdateBookingAgencyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBookingAgencyRequest $request)
    {
         $this->validate($request,[
                    'company_id'        =>  'required',
                    'name'              =>  'required|max:20|min:3',
                    'contact_person'    =>  'required|max:20|min:3',
                    'kick_back_fnb'     =>  'required',
                    'kick_back_room'    =>  'required',
                    'buildings'         =>  'required|max:200|min:5'

                ]);

        $bookingAgency = $this->bookingAgencyRepository->findWithoutFail($id);

        if (empty($bookingAgency)) {
            Flash::error('Booking Agency not found');

            return redirect(route('company.bookingAgencies.index'));
        }

        $bookingAgency = $this->bookingAgencyRepository->update($request->all(), $id);

        Flash::success('Booking Agency updated successfully.');

        return redirect(route('company.bookingAgencies.index'));
    }

    /**
     * Remove the specified BookingAgency from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bookingAgency = $this->bookingAgencyRepository->findWithoutFail($id);

        if (empty($bookingAgency)) {
            Flash::error('Booking Agency not found');

            return redirect(route('company.bookingAgencies.index'));
        }

        $this->bookingAgencyRepository->delete($id);

        Flash::success('Booking Agency deleted successfully.');

        return redirect(route('company.bookingAgencies.index'));
    }
}
