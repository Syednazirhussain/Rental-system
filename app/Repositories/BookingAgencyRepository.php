<?php

namespace App\Repositories;

use App\Models\BookingAgency;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BookingAgencyRepository
 * @package App\Repositories\Company
 * @version May 15, 2018, 2:37 pm UTC
 *
 * @method BookingAgency findWithoutFail($id, $columns = ['*'])
 * @method BookingAgency find($id, $columns = ['*'])
 * @method BookingAgency first($columns = ['*'])
*/
class BookingAgencyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'company_id',
        'name',
        'contact_person',
        'phone',
        'email',
        'mobile',
        'fax',
        'kick_back_fnb',
        'kick_back_room',
        'buildings'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BookingAgency::class;
    }

    public function getCompanyBookingAgencies($company_id)
    {
        return BookingAgency::where('company_id', $company_id)->get();
    }

}
