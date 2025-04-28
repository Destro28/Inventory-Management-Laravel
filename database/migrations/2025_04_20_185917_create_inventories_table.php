<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    public function up(): void
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();

            // Link to the user who owns this item
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            // Core inventory columns
            $table->string('item_name');
            $table->string('category');
            
            $table->integer('quantity');
            $table->decimal('price', 8, 2);
            $table->string('category_description')->nullable();
            // Stock status
            $table->string('status'); // e.g. ‘In Stock’, ‘Low Stock’, ‘Out of Stock’

            // Supplier info
            $table->string('supplier_name')->nullable();
            $table->string('supplier_category')->nullable();
            $table->string('supplier_contact')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
}
