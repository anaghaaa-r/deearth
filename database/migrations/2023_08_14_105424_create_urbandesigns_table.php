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
        Schema::create('urbandesigns', function (Blueprint $table) {
            $table->id();
            $table->integer('order');
            $table->string('order_suffix');
            $table->string('title');
            $table->string('place');
            $table->integer('year');
            $table->text('description')->nullable();
            $table->string('monogram');
            $table->string('thumbnail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('urbandesigns');
    }
};
