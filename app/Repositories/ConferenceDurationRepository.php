<?php

namespace App\Repositories;

use App\Models\ConferenceDuration;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ConferenceDurationRepository
 * @package App\Repositories
 * @version April 23, 2018, 8:17 am UTC
 *
 * @method ConferenceDuration findWithoutFail($id, $columns = ['*'])
 * @method ConferenceDuration find($id, $columns = ['*'])
 * @method ConferenceDuration first($columns = ['*'])
*/
class ConferenceDurationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ConferenceDuration::class;
    }
}
