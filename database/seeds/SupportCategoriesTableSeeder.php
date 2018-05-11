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
                'id' => 1,
                'name' => 'sdaasd',
                'created_at' => '2018-05-10 15:03:37',
                'updated_at' => '2018-05-10 15:03:40',
                'deleted_at' => '2018-05-10 15:03:40',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'billing',
                'created_at' => '2018-05-10 15:04:03',
                'updated_at' => '2018-05-11 06:09:14',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'asdsad',
                'created_at' => '2018-05-11 05:47:17',
                'updated_at' => '2018-05-11 06:09:05',
                'deleted_at' => '2018-05-11 06:09:05',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'assad asdsadsad',
                'created_at' => '2018-05-11 05:47:25',
                'updated_at' => '2018-05-11 06:09:02',
                'deleted_at' => '2018-05-11 06:09:02',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Asd asd  ASDs',
                'created_at' => '2018-05-11 05:47:35',
                'updated_at' => '2018-05-11 06:09:08',
                'deleted_at' => '2018-05-11 06:09:08',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'sadsa asasasd',
                'created_at' => '2018-05-11 05:47:52',
                'updated_at' => '2018-05-11 06:08:58',
                'deleted_at' => '2018-05-11 06:08:58',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'sdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasd',
                'created_at' => '2018-05-11 05:48:44',
                'updated_at' => '2018-05-11 06:08:55',
                'deleted_at' => '2018-05-11 06:08:55',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Technical',
                'created_at' => '2018-05-11 12:30:41',
                'updated_at' => '2018-05-11 12:30:41',
                'deleted_at' => NULL,
            ),
            8 => 
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