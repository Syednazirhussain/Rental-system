<?php

use Illuminate\Database\Seeder;

class HrCourseTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('hr_course')->delete();
        
        \DB::table('hr_course')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Adobe',
                'created_at' => '2018-06-19 07:22:35',
                'updated_at' => '2018-06-19 07:22:35',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Photoshop',
                'created_at' => '2018-06-19 07:22:44',
                'updated_at' => '2018-06-19 07:22:44',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}