<?php

use Illuminate\Database\Seeder;

class ModelHasRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('model_has_roles')->delete();
        
        \DB::table('model_has_roles')->insert(array (
            0 => 
            array (
                'role_id' => 5,
                'model_id' => 1,
                'model_type' => 'App\\Models\\User',
            ),
            1 => 
            array (
                'role_id' => 9,
                'model_id' => 2,
                'model_type' => 'App\\Models\\User',
            ),
        ));
        
        
    }
}