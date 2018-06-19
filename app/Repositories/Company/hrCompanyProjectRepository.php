<?php

namespace App\Repositories\Company;

use App\Models\Company\hrCompanyProject;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class hrCompanyProjectRepository
 * @package App\Repositories\Company
 * @version June 13, 2018, 7:18 am UTC
 *
 * @method hrCompanyProject findWithoutFail($id, $columns = ['*'])
 * @method hrCompanyProject find($id, $columns = ['*'])
 * @method hrCompanyProject first($columns = ['*'])
*/
class hrCompanyProjectRepository extends BaseRepository
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
        return hrCompanyProject::class;
    }
}
