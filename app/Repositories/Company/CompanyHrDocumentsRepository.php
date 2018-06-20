<?php

namespace App\Repositories\Company;

use App\Models\Company\CompanyHrDocuments;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CompanyHrDocumentsRepository
 * @package App\Repositories\Company
 * @version June 20, 2018, 2:46 pm UTC
 *
 * @method CompanyHrDocuments findWithoutFail($id, $columns = ['*'])
 * @method CompanyHrDocuments find($id, $columns = ['*'])
 * @method CompanyHrDocuments first($columns = ['*'])
*/
class CompanyHrDocumentsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'company_hr_id',
        'file_name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CompanyHrDocuments::class;
    }
}
