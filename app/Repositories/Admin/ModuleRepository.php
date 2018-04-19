<?php

namespace App\Repositories\Admin;

use App\Models\Module;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ModuleRepository
 * @package App\Repositories
 * @version April 4, 2018, 1:41 pm UTC
 *
 * @method Module findWithoutFail($id, $columns = ['*'])
 * @method Module find($id, $columns = ['*'])
 * @method Module first($columns = ['*'])
*/
class ModuleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'price'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Module::class;
    }
}
