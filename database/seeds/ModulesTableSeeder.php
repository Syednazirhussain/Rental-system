<?php

use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('modules')->delete();
        
        \DB::table('modules')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Conference_module',
                'price' => '2000.00',
                'created_at' => '2018-06-01 04:56:40',
                'updated_at' => '2018-06-01 04:56:40',
                'deleted_at' => NULL,
                'code' => 'conference_module',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Newsletter_module',
                'price' => '2000.00',
                'created_at' => '2018-06-01 04:57:01',
                'updated_at' => '2018-06-01 04:57:01',
                'deleted_at' => NULL,
                'code' => 'newsletter_module',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Rental_module',
                'price' => '2000.00',
                'created_at' => '2018-06-01 04:57:18',
                'updated_at' => '2018-06-01 04:57:18',
                'deleted_at' => NULL,
                'code' => 'rental_module',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Support_module',
                'price' => '2000.00',
                'created_at' => '2018-06-01 04:57:35',
                'updated_at' => '2018-06-01 04:57:35',
                'deleted_at' => NULL,
                'code' => 'support_module',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Lease_module',
                'price' => '2000.00',
                'created_at' => '2018-06-01 04:57:35',
                'updated_at' => '2018-06-01 04:57:35',
                'deleted_at' => NULL,
                'code' => 'lease_module',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'HR_module',
                'price' => '2000.00',
                'created_at' => '2018-06-01 04:57:35',
                'updated_at' => '2018-06-01 04:57:35',
                'deleted_at' => NULL,
                'code' => 'hr_module',
            ),
        ));
        
        
    }
}