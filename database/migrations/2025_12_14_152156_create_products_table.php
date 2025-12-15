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
            $table->timestamps();

            $table->string('name')->nullable(false);
            $table->decimal('price')->nullable(true);
            $table->bigInteger('category_id', false, true)->nullable(true);
            $table->boolean('in_stock')->nullable(false)->default(false);
            $table->float('rating')->nullable(true);
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("SET NULL")->onUpdate("CASCADE");
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
