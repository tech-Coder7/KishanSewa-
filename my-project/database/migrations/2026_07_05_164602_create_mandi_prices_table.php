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
        Schema::create('mandi_prices', function (Blueprint $table) {
            $table->id();
            $table->string('crop_name');
            $table->integer('price');
            $table->string('unit')->default('Quintal');
            $table->string('trend')->default('stable'); // up, down, stable
            $table->string('change_pct')->nullable();
            $table->string('mandi_name')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mandi_prices');
    }
};
