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
            $table->string('category_id'); 
            $table->string('sub_category_id'); 
            $table->string('picture');
            $table->string('name');
            $table->longText('description');
            $table->string('quantity');
            $table->string('price');
            $table->string('discount');
            $table->string('vat')->nullable();           
            $table->string('status');
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
