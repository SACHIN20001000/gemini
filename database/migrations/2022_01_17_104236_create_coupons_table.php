<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');

            $table->string('code');
            $table->enum('type', ['percentage', 'numeric']);
            $table->enum('apply_to', ['entire_orders', 'specific_category','specific_product']);
            $table->integer('apply_for')->nullable();
            $table->integer('value');
            $table->integer('count')->nullable();
            $table->date('expired_at')->nullable();
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
        Schema::dropIfExists('coupons');
    }
}
