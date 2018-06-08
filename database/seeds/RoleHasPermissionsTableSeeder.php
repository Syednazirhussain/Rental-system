<?php

use Illuminate\Database\Seeder;

class RoleHasPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_has_permissions')->delete();
        
        \DB::table('role_has_permissions')->insert(array (
            0 => 
            array (
                'permission_id' => 1,
                'role_id' => 5,
            ),
            1 => 
            array (
                'permission_id' => 1,
                'role_id' => 9,
            ),
            2 => 
            array (
                'permission_id' => 2,
                'role_id' => 5,
            ),
            3 => 
            array (
                'permission_id' => 3,
                'role_id' => 5,
            ),
            4 => 
            array (
                'permission_id' => 4,
                'role_id' => 5,
            ),
            5 => 
            array (
                'permission_id' => 5,
                'role_id' => 5,
            ),
            6 => 
            array (
                'permission_id' => 5,
                'role_id' => 9,
            ),
            7 => 
            array (
                'permission_id' => 6,
                'role_id' => 5,
            ),
            8 => 
            array (
                'permission_id' => 6,
                'role_id' => 9,
            ),
            9 => 
            array (
                'permission_id' => 10,
                'role_id' => 5,
            ),
        ));
        
        
    }
}