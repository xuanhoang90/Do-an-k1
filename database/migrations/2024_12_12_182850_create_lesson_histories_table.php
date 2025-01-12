<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_lesson_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('lesson_id');
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1-Show : 2-Hide');
            $table->timestamps();
<<<<<<<< HEAD:database/migrations/2024_12_12_182850_create_student_lesson_histories_table.php
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('lesson_id')->references('id')->on('lessons');
========
            // $table->unsignedBigInteger('created_by');
            // $table->unsignedBigInteger('updated_by');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
>>>>>>>> 01ce354e1fc89bb1b36d0b823ec8f438cb25201b:database/migrations/2024_12_12_182850_create_lesson_histories_table.php
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
<<<<<<<< HEAD:database/migrations/2024_12_12_182850_create_student_lesson_histories_table.php
        Schema::dropIfExists('student_lesson_histories');
========
        Schema::dropIfExists('lesson_histories');
>>>>>>>> 01ce354e1fc89bb1b36d0b823ec8f438cb25201b:database/migrations/2024_12_12_182850_create_lesson_histories_table.php
    }
};
