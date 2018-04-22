<?php

namespace App\Repositories\Admin;

use App\Models\CompanyContactPerson;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CompanyContactPersonRepository
 * @package App\Repositories
 * @version April 8, 2018, 9:16 am UTC
 *
 * @method CompanyContactPerson findWithoutFail($id, $columns = ['*'])
 * @method CompanyContactPerson find($id, $columns = ['*'])
 * @method CompanyContactPerson first($columns = ['*'])
*/
class CompanyContactPersonRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'company_id',
        'department',
        'designation',
        'name',
        'email',
        'phone',
        'fax',
        'address'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CompanyContactPerson::class;
    }

    /**
     * Bulk insert
     **/
    public function insert($arr = []) {
        return CompanyContactPerson::insert($arr);
    }


    public function getCompanyContactPerson($company_id)
    {
        return CompanyContactPerson::where('company_id',$company_id)->get();
    }


}
