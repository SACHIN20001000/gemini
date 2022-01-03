<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->longText('product_id');
            $table->decimal('total_price');
            $table->unsignedInteger('user_id')->nullable();
            $table->String('name');
            $table->text('email');
            $table->text('city');
            $table->text('state');
            $table->text('zip_code');
            $table->text('address');
            $table->text('address');
            $table->text('address');
            $table->String('country');
            $table->timestamps();
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
