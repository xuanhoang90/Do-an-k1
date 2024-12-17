<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Social_PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('social_posts')->insert(
            [
                [
                    'user_id' => '1',
                    'lesson_history_id' => '1',
                    'title' => 'Bài vẽ Lession 1',
                    'content' => 'Hoàn thành xuất sắc bài học',
                    'status' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => '1',
                    'updated_by' => '1',


                ],
                [
                    'user_id' => '2',
                    'lesson_history_id' => '2',
                    'title' => 'Bài vẽ Lession 2',
                    'content' => 'Hoàn thành xuất sắc bài học',
                    'status' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => '2',
                    'updated_by' => '2',
                ],
                [
                    'user_id' => '3',
                    'lesson_history_id' => '3',
                    'title' => 'Bài vẽ Lession 3',
                    'content' => 'Hoàn thành xuất sắc bài học',
                    'status' => 2,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => '3',
                    'updated_by' => '3',
                ],
                [
                    'user_id' => '4',
                    'lesson_history_id' => '4',
                    'title' => 'Bài vẽ Lession 4',
                    'content' => 'Hoàn thành xuất sắc bài học',
                    'status' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => '4',
                    'updated_by' => '4',
                ],
                [
                    'user_id' => '5',
                    'lesson_history_id' => '5',
                    'title' => 'Bài vẽ Lession 5',
                    'content' => 'Hoàn thành xuất sắc bài học',
                    'status' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => '5',
                    'updated_by' => '5',
                ],
                [
                    'user_id' => '6',
                    'lesson_history_id' => '6',
                    'title' => 'Bài vẽ Lession 6',
                    'content' => 'Hoàn thành xuất sắc bài học',
                    'status' => 2,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => '6',
                    'updated_by' => '6',
                ]
                
            ]
        );
    }
}
