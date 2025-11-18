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
        Schema::create('stock_histories', function (Blueprint $table) {
            $table->integer('id_stock')->primary()->autoIncrement();
            $table->integer('id_items');
            $table->integer('qyt');
            $table->string('note')->nullable();
            $table->timestamps();

            $table->foreign('id_items')
                ->references('id_items')
                ->on('items')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_histories');
    }
};
