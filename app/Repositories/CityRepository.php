<?php

namespace App\Repositories;

use App\Models\City;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StateRepository
 * @package App\Repositories
 * @version April 11, 2018, 2:26 pm UTC
 *
 * @method State findWithoutFail($id, $columns = ['*'])
 * @method State find($id, $columns = ['*'])
 * @method State first($columns = ['*'])
*/
class CityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'state_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return City::class;
    }


    /**
     * Find Cities related to a State
     **/
    public function findCities(int $state_id)
    {
        $cities = City::where('state_id', $state_id)->get();
        return $cities;
    }


}
