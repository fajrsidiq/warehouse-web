<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeleteHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('delete_histories', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->integer('stock_in_amount')->nullable();
            $table->decimal('weight', 8, 2)->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('notes')->nullable();
            $table->enum('type', ['masuk', 'keluar']); // Updated field for type
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('delete_histories');
    }
}

