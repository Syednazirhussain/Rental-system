<?php

use Illuminate\Database\Seeder;

class HrPersonalCatTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('hr_personal_cat')->delete();
        
        \DB::table('hr_personal_cat')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Project leader',
                'created_at' => '2018-06-19 06:46:55',
                'updated_at' => '2018-06-19 06:46:55',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Accountant',
                'created_at' => '2018-06-19 06:47:27',
                'updated_at' => '2018-06-19 06:47:27',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}