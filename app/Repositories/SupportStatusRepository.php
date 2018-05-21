<?php

namespace App\Repositories;

use App\Models\SupportStatus;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SupportStatusRepository
 * @package App\Repositories\Admin
 * @version May 10, 2018, 1:29 pm UTC
 *
 * @method SupportStatus findWithoutFail($id, $columns = ['*'])
 * @method SupportStatus find($id, $columns = ['*'])
 * @method SupportStatus first($columns = ['*'])
*/
class SupportStatusRepository extends BaseRepository
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
        return SupportStatus::class;
    }
}
