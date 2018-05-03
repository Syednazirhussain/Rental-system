<?php

namespace App\Repositories;

use App\Models\PaymentCycle;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PaymentCycleRepository
 * @package App\Repositories\Admin
 * @version May 3, 2018, 9:18 am UTC
 *
 * @method PaymentCycle findWithoutFail($id, $columns = ['*'])
 * @method PaymentCycle find($id, $columns = ['*'])
 * @method PaymentCycle first($columns = ['*'])
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
