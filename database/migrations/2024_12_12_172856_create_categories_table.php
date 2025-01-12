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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('thumbnail')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1-Show : 2-Hide');
            $table->unsignedBigInteger('national_id');
            $table->foreign('national_id')->references('id')->on('nationals')->onDelete('cascade');
            // $table->unsignedBigInteger('created_by');
            // $table->unsignedBigInteger('updated_by');
            $table->timestamps();
<<<<<<<< HEAD:database/migrations/2024_12_12_172859_create_categories_table.php
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
========
>>>>>>>> 01ce354e1fc89bb1b36d0b823ec8f438cb25201b:database/migrations/2024_12_12_172856_create_categories_table.php
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
