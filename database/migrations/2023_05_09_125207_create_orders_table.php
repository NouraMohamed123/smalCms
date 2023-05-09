<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table
                ->enum('status', [
                    'pending',
                    'processing',
                    'delivering',
                    'completed',
                    'canceld',
                    'refanded',
                ])
                ->default('pending');
            $table->decimal('total', 8, 2);
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->timestamps();
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
