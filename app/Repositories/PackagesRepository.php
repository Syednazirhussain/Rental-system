<?php

namespace App\Repositories;

use App\Models\Packages;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PackagesRepository
 * @package App\Repositories\Company/conference
 * @version April 21, 2018, 11:43 am UTC
 *
 * @method Packages findWithoutFail($id, $columns = ['*'])
 * @method Packages find($id, $columns = ['*'])
 * @method Packages first($columns = ['*'])
*/
class PackagesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'items',
        'price',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Packages::class;
    }
}
