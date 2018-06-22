<?php

namespace App\Repositories\Company;

use App\Models\Company\CompanyHrNotes;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CompanyHrNotesRepository
 * @package App\Repositories\Company
 * @version June 19, 2018, 1:55 pm UTC
 *
 * @method CompanyHrNotes findWithoutFail($id, $columns = ['*'])
 * @method CompanyHrNotes find($id, $columns = ['*'])
 * @method CompanyHrNotes first($columns = ['*'])
*/
class CompanyHrNotesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'company_hr_id',
        'user_id',
        'code',
        'note'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CompanyHrNotes::class;
    }
}
