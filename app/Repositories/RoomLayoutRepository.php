<?php

namespace App\Repositories;

use App\Models\RoomLayout;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RoomLayoutRepository
 * @package App\Repositories\Company/conference
 * @version April 21, 2018, 7:11 am UTC
 *
 * @method RoomLayout findWithoutFail($id, $columns = ['*'])
 * @method RoomLayout find($id, $columns = ['*'])
 * @method RoomLayout first($columns = ['*'])
*/
class RoomLayoutRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'image',
        'update_at'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RoomLayout::class;
    }
}
