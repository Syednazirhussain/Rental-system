<?php

namespace App\Repositories\Company;

use App\Models\Company\RoomImages;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RoomImagesRepository
 * @package App\Repositories\Company
 * @version May 31, 2018, 12:05 pm UTC
 *
 * @method RoomImages findWithoutFail($id, $columns = ['*'])
 * @method RoomImages find($id, $columns = ['*'])
 * @method RoomImages first($columns = ['*'])
*/
class RoomImagesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'room_id',
        'sitting_id',
        'entity_type',
        'image_file'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RoomImages::class;
    }
}
