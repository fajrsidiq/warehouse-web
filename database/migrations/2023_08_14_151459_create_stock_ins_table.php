<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('stock_ins', function (Blueprint $table) {
        $table->id();
        $table->string('item_name');
        $table->unsignedBigInteger('stock_in_amount');
        $table->decimal('weight', 10, 2)->default(0);
        $table->decimal('price', 10, 2);
        $table->text('notes')->nullable();
        $table->timestamps();
        
        $table->foreign('item_name')->references('item_name')->on('stocks');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_ins');
    }
};
