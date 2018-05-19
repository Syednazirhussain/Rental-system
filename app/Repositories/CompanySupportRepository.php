<?php

namespace App\Repositories;

use App\Models\CompanySupport;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CompanySupportRepository
 * @package App\Repositories\Company
 * @version May 19, 2018, 5:50 am UTC
 *
 * @method CompanySupport findWithoutFail($id, $columns = ['*'])
 * @method CompanySupport find($id, $columns = ['*'])
 * @method CompanySupport first($columns = ['*'])
*/
class CompanySupportRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'parent_id',
        'subject',
        'content',
        'html',
        'status_id',
        'priority_id',
        'user_id',
        'category_id',
        'company_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CompanySupport::class;
    }
}
