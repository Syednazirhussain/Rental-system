<?php

namespace App\Repositories\Admin;

use App\Models\CompanyContactPerson;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CompanyContactPersonRepository
 * @package App\Repositories\Admin
 * @version April 4, 2018, 1:26 pm UTC
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
}
