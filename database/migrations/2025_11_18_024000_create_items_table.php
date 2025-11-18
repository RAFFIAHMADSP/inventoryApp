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
        Schema::create('items', function (Blueprint $table) {
            $table->integer('id_items')->primary()->autoIncrement();
            $table->integer('id_categories');
            $table->string('name');
            $table->string('code')->unique();
            $table->integer('stock')->default(0);
            $table->string('purchase_price')->nullable();
            $table->string('selling_price')->nullable();
            $table->timestamps();

            $table->foreign('id_categories')
                ->references('id_categories')
                ->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
