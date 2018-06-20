<?php

namespace App\Repositories\Company;

use App\Models\Company\hrEmploymentForm;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class hrEmploymentFormRepository
 * @package App\Repositories\Company
 * @version June 12, 2018, 8:50 am UTC
 *
 * @method hrEmploymentForm findWithoutFail($id, $columns = ['*'])
 * @method hrEmploymentForm find($id, $columns = ['*'])
 * @method hrEmploymentForm first($columns = ['*'])
*/
class hrEmploymentFormRepository extends BaseRepository
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
        return hrEmploymentForm::class;
    }
}
