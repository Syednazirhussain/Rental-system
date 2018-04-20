<?php

namespace App\Repositories;

use App\Models\GeneralSetting;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class GeneralSettingRepository
 * @package App\Repositories
 * @version April 4, 2018, 1:25 pm UTC
 *
 * @method Company findWithoutFail($id, $columns = ['*'])
 * @method Company find($id, $columns = ['*'])
 * @method Company first($columns = ['*'])
*/
class GeneralSettingRepository extends BaseRepository
{

    /**
     * Configure the Model
     **/
    public function model()
    {
        return GeneralSetting::class;
    }


}
