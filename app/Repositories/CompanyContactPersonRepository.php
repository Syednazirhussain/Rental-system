<?php

namespace App\Repositories;

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

    /**
     * Bulk insert
     **/
    // public function updateOrCreate($where=[], $data = []) {
    //     return CompanyContactPerson::updateOrCreate($where, $data);
    // }
}
