<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');
        $users = [
            [
                'name' =>           'Administrator',
                'email' =>          'admin@admin.com',
                'password'       => '$2y$10$rA.UbFkvBY0TnPXC5AvdEew7ITCs.PFo9eAfkH.m48GlOdhFMXvLG', // Already hased
                'remember_token' => null,
                'created_at' =>     $now,
                'updated_at' =>     $now,
            ],
        ];

        // Checking if the table already have a query
        if (is_null(DB::table('users')->first()))
            DB::table('users')->insert($users);
        else
            echo "\e[31mTable is not empty, therefore NOT ";
    }
}
