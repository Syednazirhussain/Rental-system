<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateUserStatusRequest;
use App\Http\Requests\UpdateUserStatusRequest;
use App\Repositories\UserStatusRepository;

use App\Repositories\CityRepository;
use App\Repositories\StateRepository;
use App\Repositories\CountryRepository;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class UserStatusController extends AppBaseController
{
    /** @var  UserStatusRepository */
    private $userStatusRepository;

    public function __construct(
        UserStatusRepository $userStatusRepo,
        CountryRepository $CountryRepository,
        StateRepository $StateRepository,
        CityRepository $CityRepository
    )
    {
        $this->userStatusRepository = $userStatusRepo;
        $this->countryRepository    = $CountryRepository;
        $this->stateRepository      = $StateRepository;
        $this->cityRepository       = $CityRepository;
    }

    /**
     * Display a listing of the UserStatus.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->userStatusRepository->pushCriteria(new RequestCriteria($request));
        $userStatuses = $this->userStatusRepository->all();

        return view('admin.user_statuses.index')
            ->with('userStatuses', $userStatuses);
    }

    public function generalSetting()
    {
        $country = $this->countryRepository->all();
        $state   = $this->stateRepository->all();
        $city    = $this->cityRepository->all();
        $data = [
            'country' => $country,
            'state'   => $state,
            'city'    => $city     
        ];
        return view('admin.admin_general.index',compact('data'));
    }

    public function addOrUpdate(Request $request)
    {
        return $request->all();
    }

    /**
     * Show the form for creating a new UserStatus.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.user_statuses.create');
    }

    /**
     * Store a newly created UserStatus in storage.
     *
     * @param CreateUserStatusRequest $request
     *
     * @return Response
     */
    public function store(CreateUserStatusRequest $request)
    {
        $input = $request->all();

        $userStatus = $this->userStatusRepository->create($input);

        $request->session()->flash('msg.success', 'User Status saved successfully.');


        return redirect(route('admin.userStatuses.index'));
    }

    /**
     * Display the specified UserStatus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userStatus = $this->userStatusRepository->findWithoutFail($id);

        if (empty($userStatus)) {
            session()->flash('msg.error', 'User Status not found');

            return redirect(route('admin.userStatuses.index'));
        }

        return view('admin.user_statuses.show')->with('userStatus', $userStatus);
    }

    /**
     * Show the form for editing the specified UserStatus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userStatus = $this->userStatusRepository->findWithoutFail($id);

        if (empty($userStatus)) {
            session()->flash('msg.error', 'User Status not found');

            return redirect(route('admin.userStatuses.index'));
        }

        return view('admin.user_statuses.edit')->with('userStatus', $userStatus);
    }

    /**
     * Update the specified UserStatus in storage.
     *
     * @param  int              $id
     * @param UpdateUserStatusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserStatusRequest $request)
    {
        $userStatus = $this->userStatusRepository->findWithoutFail($id);

        if (empty($userStatus)) {
            session()->flash('msg.error', 'User Status not found');

            return redirect(route('admin.userStatuses.index'));
        }

        $userStatus = $this->userStatusRepository->update($request->all(), $id);

        $request->session()->flash('msg.success', 'User Status updated successfully.');


        return redirect(route('admin.userStatuses.index'));
    }

    /**
     * Remove the specified UserStatus from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userStatus = $this->userStatusRepository->findWithoutFail($id);

        if (empty($userStatus)) {
            session()->flash('msg.error', 'User Status not found');

            return redirect(route('admin.userStatuses.index'));
        }

        $this->userStatusRepository->delete($id);

        session()->flash('msg.success', 'User Status deleted successfully.');


        return redirect(route('admin.userStatuses.index'));
    }
}
