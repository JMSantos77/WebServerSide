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
        Schema::create('gifts', function (Blueprint $table) {
            $table->id();
            $table->String('giftName');
            $table->unsignedBigInteger('user_Id');
            $table->foreign('user_Id')->references('id')->on('users');
            $table->String('giftDescription')->nullable();
            $table->integer('predictedValue');
            $table->integer('spentValue')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gifts');
    }
};
