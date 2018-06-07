<?php

namespace App\Repositories;

use App\Models\CompanySupportPriorities;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SupportPrioritiesRepository
 * @package App\Repositories\Admin
 * @version May 10, 2018, 1:33 pm UTC
 *
 * @method SupportPriorities findWithoutFail($id, $columns = ['*'])
 * @method SupportPriorities find($id, $columns = ['*'])
 * @method SupportPriorities first($columns = ['*'])
*/
class SupportPrioritiesRepository extends BaseRepository
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
        return CompanySupportPriorities::class;
    }
}
