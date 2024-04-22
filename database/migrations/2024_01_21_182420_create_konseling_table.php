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
        Schema::create('konseling', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('psikolog_id');
            $table->foreign('psikolog_id')->references('id')->on('users');
            
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('users');

            $table->string('phone');
            $table->integer('gender'); // 1 for Male, 2 for Female
            $table->string('address');
            $table->integer('category'); // 1 for Online, 2 for Offline
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->boolean('berlangsung')->default(true);
            $table->string('description');
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konseling');
    }
};
