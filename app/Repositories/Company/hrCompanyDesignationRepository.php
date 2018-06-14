<?php

namespace App\Repositories\Company;

use App\Models\Company\hrCompanyDesignation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class hrCompanyDesignationRepository
 * @package App\Repositories\Company
 * @version June 11, 2018, 11:19 am UTC
 *
 * @method hrCompanyDesignation findWithoutFail($id, $columns = ['*'])
 * @method hrCompanyDesignation find($id, $columns = ['*'])
 * @method hrCompanyDesignation first($columns = ['*'])
*/
class hrCompanyDesignationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return hrCompanyDesignation::class;
    }
}
