<?php

namespace App\Repositories;

use App\Models\Support;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SupportRepository
 * @package App\Repositories\Admin
 * @version May 10, 2018, 1:34 pm UTC
 *
 * @method Support findWithoutFail($id, $columns = ['*'])
 * @method Support find($id, $columns = ['*'])
 * @method Support first($columns = ['*'])
*/
class SupportRepository extends BaseRepository
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
        'category_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Support::class;
    }
}
