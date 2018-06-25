<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\Company\CreateBookingAgencyRequest;
use App\Http\Requests\Company\UpdateBookingAgencyRequest;
use App\Repositories\BookingAgencyRepository;
use App\Repositories\CompanyRepository;
use App\Repositories\CompanyBuildingRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\CompanyBuilding;
use Auth;

use App\Models\Company;
use App\Models\User;
use Session;

class BookingAgencyController extends AppBaseController
{
    /** @var  BookingAgencyRepository */
    private $bookingAgencyRepository;
    private $CompanyRepository;
    private $CompanyBuildingRepository;

    public function __construct(BookingAgencyRepository $bookingAgencyRepo,
                                  CompanyRepository $companyRepo,
                                  CompanyBuildingRepository $companyBuildingRepo
                                )
    {
        $this->bookingAgencyRepository = $bookingAgencyRepo;
        $this->CompanyRepository = $companyRepo;
        $this->CompanyBuildingRepository = $companyBuildingRepo;
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
        // $company =  $this->CompanyRepository->all();
        $companyBuilding =  $this->CompanyBuildingRepository->all();
        $userId = Auth::guard('company')->user()->id;

        $user = User::where('id',$userId)->first();

        $companyName = $user->companyUser->company->name;


        // dd($user);

        $data = [
             'companyBuilding'   =>  $companyBuilding,
             'companyName'      =>  $companyName
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
                   
                    'name'              =>  'required|max:20|min:3',
                    'contact_person'    =>  'required|max:20|min:3',
                    'phone'             =>  'required|max:20|min:8',
                    'kick_back_fnb'     =>  'required',
                    'kick_back_room'    =>  'required',
                    'buildings'         =>  'required'

                ]);

        $input = $request->all();

         $userId = Auth::guard('company')->user()->id;

        $user = User::where('id',$userId)->first();

        $companyid = $user->companyUser->company->id;
        $input['company_id'] = $companyid;

        // dd($input);

                    
            $input['buildings'] = json_encode(array_values($input['buildings']));

            $bookingAgency = $this->bookingAgencyRepository->create($input);

            /*Flash::success('Booking Agency saved successfully.');*/
            Session::flash("successMessage", "Booking Agency saved successfully");

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
        $companyBuilding =  $this->CompanyBuildingRepository->all();
        // dd($bookingAgency);
        $companyjson = json_decode($bookingAgency->buildings);
         // dd($companyjson);
        $selectedCompany = CompanyBuilding::whereIn('id', $companyjson)->get();

         $userId = Auth::guard('company')->user()->id;

        $user = User::where('id',$userId)->first();

        $companyName = $user->companyUser->company->name;
        $companyid = $user->companyUser->company->id;




        // dd($users);
        $data = [
            'company'           =>  $company,
            'bookingAgency'     =>  $bookingAgency,
            'companyBuilding'   =>  $companyBuilding,
            'selectedCompany'   =>  $selectedCompany,
            'companyName'       =>  $companyName,
            'companyid'         =>  $companyid
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
        // dd($request->all());
          $this->validate($request,[
                    'name'              =>  'required|max:20|min:3',
                    'contact_person'    =>  'required|max:20|min:3',
                    'phone'             =>  'required|max:20|min:8',
                    'kick_back_fnb'     =>  'required',
                    'kick_back_room'    =>  'required',
                    'buildings'         =>  'required'

                ]);
          
                    $input = $request->all();


                    $userId = Auth::guard('company')->user()->id;

                    $user = User::where('id',$userId)->first();

                    $companyid = $user->companyUser->company->id;
                    $input['company_id'] = $companyid;

                    $input['buildings'] = json_encode(array_values($input['buildings']));

                    $bookingAgency = $this->bookingAgencyRepository->findWithoutFail($id);

            if (empty($bookingAgency)) {
                Flash::error('Booking Agency not found');

                return redirect(route('company.bookingAgencies.index'));
            }

            $bookingAgency = $this->bookingAgencyRepository->update($input, $id);

            /*Flash::success('Booking Agency updated successfully.');*/
            Session::flash("successMessage", "Booking Agency updated successfully");

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

        /*Flash::success('Booking Agency deleted successfully.');*/
        Session::flash("deleteMessage", "Booking Agency deleted successfully");

        return redirect(route('company.bookingAgencies.index'));
    }
}
