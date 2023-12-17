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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('childcategory_id')->constrained();
            $table->foreignId('offer_id')->nullable()->constrained();
            $table->foreignId('brand_id')->nullable()->constrained();
            $table->string('name');
            $table->text('description');
            $table->integer('price');
            $table->double('offer_price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
