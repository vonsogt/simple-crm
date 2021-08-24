<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(LanguageLinesTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(SellsTableSeeder::class);
    }
}
