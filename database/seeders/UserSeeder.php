<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'SuperAdmin',
                    'email' => 'superadmin@caligraphy.com',
                    'password' => Hash::make('12345678'),
                    'type' => 1,
                    'status' => 1,
                ],
                [
                    'name' => 'Admin',
                    'email' => 'admin@caligraphy.com',
                    'password' => Hash::make('12345678'),
                    'type' => 1,
                    'status' => 1,
                ],
            ]
        );
    }
}
