<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Lession_HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lesson_histories')->insert(
            [
                [
                    'user_id' => '1',
                    'lesson_id' => '1',
                    'image' => 'lessson1.png',
                    'status' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => '1',
                    'updated_by' => '1',
                ],
                [
                    'user_id' => '2',
                    'lesson_id' => '2',
                    'image' => 'lessson2.png',
                    'status' => 2,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => '2',
                    'updated_by' => '2',
                ],
                [
                    'user_id' => '3',
                    'lesson_id' => '3',
                    'image' => 'lessson3.png',
                    'status' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => '3',
                    'updated_by' => '3',
                ],
                [
                    'user_id' => '4',
                    'lesson_id' => '4',
                    'image' => 'lessson4.png',
                    'status' => 2,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => '4',
                    'updated_by' => '4',
                ],
                [
                    'user_id' => '5',
                    'lesson_id' => '5',
                    'image' => 'lessson5.png',
                    'status' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => '5',
                    'updated_by' => '5',
                ],
                [
                    'user_id' => '6',
                    'lesson_id' => '6',
                    'image' => 'lessson6.png',
                    'status' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => '6',
                    'updated_by' => '6',
                ]
                
            ]
        );
    }
}
