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
            $table->string('thumbnail');
            $table->tinyInteger('status')->default(1)->comment('1-Show : 2-Hide');
            $table->unsignedBigInteger('national_id');
            $table->foreign('national_id')->references('id')->on('nationals')->onDelete('cascade');
            // $table->unsignedBigInteger('created_by');
            // $table->unsignedBigInteger('updated_by');
            $table->timestamps();
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
