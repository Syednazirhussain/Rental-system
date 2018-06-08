<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'modules',
                'guard_name' => 'admin',
                'created_at' => '2018-05-05 13:24:48',
                'updated_at' => '2018-05-08 12:57:37',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'payments',
                'guard_name' => 'admin',
                'created_at' => '2018-05-05 13:25:05',
                'updated_at' => '2018-05-08 12:57:47',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'settings',
                'guard_name' => 'admin',
                'created_at' => '2018-05-05 13:25:28',
                'updated_at' => '2018-05-08 12:57:21',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'newletters',
                'guard_name' => 'admin',
                'created_at' => '2018-05-05 13:25:41',
                'updated_at' => '2018-05-08 12:57:42',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'companies',
                'guard_name' => 'admin',
                'created_at' => '2018-05-05 13:26:04',
                'updated_at' => '2018-05-05 13:26:04',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'invoices',
                'guard_name' => 'admin',
                'created_at' => '2018-05-05 13:26:23',
                'updated_at' => '2018-05-05 13:26:23',
            ),
            6 => 
            array (
                'id' => 10,
                'name' => 'users',
                'guard_name' => 'admin',
                'created_at' => '2018-05-08 14:08:00',
                'updated_at' => '2018-05-08 14:08:00',
            ),
        ));
        
        
    }
}