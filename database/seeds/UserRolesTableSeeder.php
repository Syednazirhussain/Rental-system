<?php

use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_roles')->delete();
        
        \DB::table('user_roles')->insert(array (
            0 => 
            array (
                'id' => 5,
                'code' => 'admin',
                'name' => 'Admin',
                'guard_name' => 'admin',
                'created_at' => date('Y-m-d h:i:s'),
            ),
            1 => 
            array (
                'id' => 6,
                'code' => 'company',
                'name' => 'Company',
                'guard_name' => 'web',
                'created_at' => date('Y-m-d h:i:s'),
                

            ),
            2 =>
            array (
                'id' => 7,
                'code' => 'company_admin',
                'name' => 'Company Admin',
                'guard_name' => 'web',
                'created_at' => date('Y-m-d h:i:s'),
                
            ),

            3 =>
            array (
                'id' => 8,
                'code' => 'company_customer',
                'name' => 'Company Customer',
                'guard_name' => 'web',
                'created_at' => date('Y-m-d h:i:s'),
                
            ),
        ));
        
        
    }
}