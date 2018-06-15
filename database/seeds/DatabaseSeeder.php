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

        $this->call(CountriesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);
        $this->call(UserStatusTableSeeder::class);
        $this->call(PaymentMethodsTableSeeder::class);
        $this->call(DiscountTypeTableSeeder::class);
        $this->call(PaymentCyclesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(GeneralSettingsTableSeeder::class);
        $this->call(ConferenceDurationsTableSeeder::class);
        $this->call(ConferenceEquipmentsCriteriaTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
        $this->call(SupportCategoriesTableSeeder::class);
        $this->call(SupportPrioritiesTableSeeder::class);
        $this->call(SupportStatusTableSeeder::class);
        $this->call(AnswerTypesTableSeeder::class);
    }
}
