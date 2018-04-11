<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(ModulesTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);
        $this->call(UserStatusTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(PaymentMethodsTableSeeder::class);
        $this->call(DiscountTypeTableSeeder::class);

        $this->call(UsersTableSeeder::class);
        
    }
}
