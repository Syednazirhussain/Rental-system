<?php

namespace App\Repositories\Company;

use App\Models\Company\HRCourses;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class HRCoursesRepository
 * @package App\Repositories\Company
 * @version June 14, 2018, 9:02 am UTC
 *
 * @method HRCourses findWithoutFail($id, $columns = ['*'])
 * @method HRCourses find($id, $columns = ['*'])
 * @method HRCourses first($columns = ['*'])
*/
class HRCoursesRepository extends BaseRepository
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
        return HRCourses::class;
    }
}
