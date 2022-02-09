<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolutionHubProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solutionhub_products', function (Blueprint $table) {
            $table->id();
            $table->string('productName')->nullable();
            $table->longText('description')->nullable();
            $table->string('tag')->nullable();
            $table->string('status')->nullable();
            $table->string('feature_image')->nullable();
            $table->integer('separation_anxiety')->nullable();
            $table->integer('teething')->nullable();
            $table->integer('boredom')->nullable();
            $table->integer('disabled')->nullable();
            $table->integer('energetic')->nullable();
            $table->timestamps();
        });

        Schema::create('solutionhub_tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('solutionhub_product_tags', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('tag_id');
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
        Schema::dropIfExists('solutionhub_products');

    }
}
