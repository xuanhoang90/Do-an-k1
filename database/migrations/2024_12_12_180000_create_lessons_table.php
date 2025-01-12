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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('thumbnail')->nullable();
            $table->string('short_description');
<<<<<<< HEAD
            $table->longText('content');

            $table->unsignedBigInteger('national_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('level_id');
            $table->tinyInteger('status')->default(1)->comment('1-Show : 2-Hide');

            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->foreign('national_id')->references('id')->on('nationals');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('level_id')->references('id')->on('levels');
=======
            $table->string('thumbnail');
            $table->string('sample_image');
            $table->tinyInteger('status')->default(1);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('level_id')->nullable();
            // $table->unsignedBigInteger('created_by');
            // $table->unsignedBigInteger('updated_by');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
>>>>>>> 01ce354e1fc89bb1b36d0b823ec8f438cb25201b
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
