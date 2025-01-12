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
        Schema::create('social_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('student_lesson_history_id');
            $table->string('title');
            $table->text('content')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1-Show : 2-Hide');

            $table->timestamps();
<<<<<<< HEAD
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('student_lesson_history_id')->references('id')->on('student_lesson_histories');
=======
            // $table->unsignedBigInteger('created_by');
            // $table->unsignedBigInteger('updated_by');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('lesson_history_id')->references('id')->on('lesson_histories')->onDelete('cascade');
>>>>>>> 01ce354e1fc89bb1b36d0b823ec8f438cb25201b
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_posts');
    }
};
