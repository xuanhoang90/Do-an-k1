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
        Schema::create('social_post_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('social_post_id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->text('content');
            $table->tinyInteger('status')->default(1)->comment('1-Show : 2-Hide');
            $table->timestamps();
<<<<<<< HEAD
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('social_post_id')->references('id')->on('social_posts');
=======
            // $table->unsignedBigInteger('created_by');
            // $table->unsignedBigInteger('updated_by');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('social_post_id')->references('id')->on('social_posts')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('social_post_comments')->onDelete('cascade');
>>>>>>> 01ce354e1fc89bb1b36d0b823ec8f438cb25201b
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_post_comments');
    }
};
