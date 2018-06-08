<?php

use Illuminate\Database\Seeder;

class SupportCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('support_categories')->delete();
        
        \DB::table('support_categories')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'billing',
                'created_at' => '2018-05-10 15:04:03',
                'updated_at' => '2018-05-11 06:09:14',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 8,
                'name' => 'Technical',
                'created_at' => '2018-05-11 12:30:41',
                'updated_at' => '2018-05-11 12:30:41',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 9,
                'name' => 'Customer Service',
                'created_at' => '2018-05-11 12:31:01',
                'updated_at' => '2018-05-11 12:31:01',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}