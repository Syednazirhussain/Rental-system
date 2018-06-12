<?php

namespace App\Repositories\Company;

use App\Models\Company\RoomNotes;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RoomNotesRepository
 * @package App\Repositories\Company
 * @version May 31, 2018, 12:06 pm UTC
 *
 * @method RoomNotes findWithoutFail($id, $columns = ['*'])
 * @method RoomNotes find($id, $columns = ['*'])
 * @method RoomNotes first($columns = ['*'])
*/
class RoomNotesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'room_id',
        'user_id',
        'note'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RoomNotes::class;
    }
}
