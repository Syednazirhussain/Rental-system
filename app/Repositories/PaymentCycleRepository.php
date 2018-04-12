<?php

namespace App\Repositories;

use App\Models\PaymentCycle;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PaymentCycleRepository
 * @package App\Repositories
 * @version April 11, 2018, 2:26 pm UTC
 *
 * @method State findWithoutFail($id, $columns = ['*'])
 * @method State find($id, $columns = ['*'])
 * @method State first($columns = ['*'])
*/
class PaymentCycleRepository extends BaseRepository
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
        return PaymentCycle::class;
    }

}
