<?php

namespace App\Repositories\Company;

use App\Models\Company\hrCivilStatus;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class hrCivilStatusRepository
 * @package App\Repositories\Company
 * @version June 11, 2018, 7:42 am UTC
 *
 * @method hrCivilStatus findWithoutFail($id, $columns = ['*'])
 * @method hrCivilStatus find($id, $columns = ['*'])
 * @method hrCivilStatus first($columns = ['*'])
*/
class hrCivilStatusRepository extends BaseRepository
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
        return hrCivilStatus::class;
    }
}
