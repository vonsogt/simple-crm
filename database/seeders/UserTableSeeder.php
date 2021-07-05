<?php

namespace Database\Seeders;

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
        $users = [
            [
                'name' =>           'Administrator',
                'email' =>          'admin@admin.com',
                'password'       => '$2y$10$rA.UbFkvBY0TnPXC5AvdEew7ITCs.PFo9eAfkH.m48GlOdhFMXvLG', // Already hased
                'remember_token' => null,
                'created_at' =>     date("Y-m-d H:i:s"),
                'updated_at' =>     date("Y-m-d H:i:s"),
            ],
        ];

        // Checking if users table already have a query
        if (is_null(DB::table('users')->first()))
            DB::table('users')->insert($users);
        else
            echo "\e[31mTable is not empty, therefore NOT ";
    }
}
