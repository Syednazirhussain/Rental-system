<?php

namespace App\Repositories\Company;

use App\Models\Company\hrCompanyCollective;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class hrCompanyCollectiveRepository
 * @package App\Repositories\Company
 * @version June 11, 2018, 11:16 am UTC
 *
 * @method hrCompanyCollective findWithoutFail($id, $columns = ['*'])
 * @method hrCompanyCollective find($id, $columns = ['*'])
 * @method hrCompanyCollective first($columns = ['*'])
*/
class hrCompanyCollectiveRepository extends BaseRepository
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
        return hrCompanyCollective::class;
    }
}
