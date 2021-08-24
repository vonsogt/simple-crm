<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Checking if the table already have a query
        if (is_null(DB::table('items')->first()))
            Item::factory()->count(25)->create();
        else
            echo "\e[31mTable is not empty, therefore NOT ";
    }
}
