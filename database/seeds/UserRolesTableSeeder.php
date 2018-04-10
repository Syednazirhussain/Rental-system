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
            ),
            1 => 
            array (
                'id' => 6,
                'code' => 'company',
                'name' => 'Company',
            ),
            2 => 
            array (
                'id' => 7,
                'code' => 'company_admin',
                'name' => 'Company Admin',
            ),
        ));
        
        
    }
}