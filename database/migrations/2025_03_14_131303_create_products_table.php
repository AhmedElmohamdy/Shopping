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
            $table->id()->primary();
            $table->string('product_name');
            $table->decimal('product_price', 10, 2);;
            $table->integer('product_quantity')->default(0);
            $table->text('image_name');
            $table->text('description')->nullable();
             // Define foreign key
            $table->foreignId('cat_id')->constrained('categories')->cascadeOnDelete();
           
           /* $table->unsignedBigInteger('cat_id'); // Foreign key
             // Define foreign key constraint
             $table->foreign('cat_id')->references('id')->on('categories')->cascadeOnDelete();*/
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
