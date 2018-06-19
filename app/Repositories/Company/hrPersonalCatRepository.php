<?php

namespace App\Repositories\Company;

use App\Models\Company\hrPersonalCat;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class hrPersonalCatRepository
 * @package App\Repositories\Company
 * @version June 11, 2018, 11:13 am UTC
 *
 * @method hrPersonalCat findWithoutFail($id, $columns = ['*'])
 * @method hrPersonalCat find($id, $columns = ['*'])
 * @method hrPersonalCat first($columns = ['*'])
*/
class hrPersonalCatRepository extends BaseRepository
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
        return hrPersonalCat::class;
    }
}
