<?php

namespace App\Repositories\Company;

use App\Models\Company\LeaseAttachment;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LeaseAttachmentRepository
 * @package App\Repositories\Company
 * @version June 11, 2018, 9:55 am UTC
 *
 * @method LeaseAttachment findWithoutFail($id, $columns = ['*'])
 * @method LeaseAttachment find($id, $columns = ['*'])
 * @method LeaseAttachment first($columns = ['*'])
*/
class LeaseAttachmentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'file_name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LeaseAttachment::class;
    }
}
