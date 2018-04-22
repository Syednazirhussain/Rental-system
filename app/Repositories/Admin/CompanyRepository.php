<?php

namespace App\Repositories\Admin;

use App\Models\Company;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CompanyRepository
 * @package App\Repositories
 * @version April 4, 2018, 1:25 pm UTC
 *
 * @method Company findWithoutFail($id, $columns = ['*'])
 * @method Company find($id, $columns = ['*'])
 * @method Company first($columns = ['*'])
*/
class CompanyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'second_name',
        'logo',
        'description',
        'address',
        'zipcode',
        'phone',
        'country_id',
        'state_id',
        'city_id',
        'uuid',
        'user_role_code',
        'max_users',
        'user_status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Company::class;
    }


    public function companyCount()
    {
        return Company::count();
    }

    public function companyRecent()
    {
        return Company::select('id','name','phone','zipcode','address','created_at')->orderBy('id', 'desc')->take(5)->get();
    }

    public function getCompanyById($company_id)
    {
        return Company::find($company_id);
    }

}
