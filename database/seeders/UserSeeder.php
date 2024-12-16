<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                    'name' => 'Châu Thục Khuên',
                    'email' => 'chauthuckhue@gmail.com',
                    'password' => Hash::make('12345678'),
                    'type' => 1,
                    'status' => 1,

                ],
                [
                    'name' => 'Huỳnh Thanh Hà',
                    'email' => 'huynhthanhha@gmail.com',
                    'password' => Hash::make('12345678'),
                    'type' => 1,
                    'status' => 1,
                ],
                [
                    'name' => 'Trần Tú Trân',
                    'email' => 'trantutran@gmail.com',
                    'password' => Hash::make('12345678'),
                    'type' => 2,
                    'status' => 1,

                ],
                [
                    'name' => 'Võ Khánh An',
                    'email' => 'vokhanhan@gmail.com',
                    'password' => Hash::make('12345678'),
                    'type' => 2,
                    'status' => 1,
                ],
                [
                    'name' => 'Nguyễn Ái Như',
                    'email' => 'nguyenainhu@gmail.com',
                    'password' => Hash::make('12345678'),
                    'type' => 2,
                    'status' => 1,
                ],
                [
                    'name' => 'Lê Hoàng Diệp',
                    'email' => 'lehoangdiep@gmail.com',
                    'password' => Hash::make('12345678'),
                    'type' => 2,
                    'status' => 1,
                ]
                
            ]
        );
    }
}
