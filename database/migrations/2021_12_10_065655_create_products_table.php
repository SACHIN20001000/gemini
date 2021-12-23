<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('productName')->nullable();
            $table->longText('description')->nullable();
            $table->set('type', ['Single Product', 'Variation'])->default('Single Product');
            $table->string('feature_image')->nullable();
            $table->float('real_price', 8, 2)->nullable();
            $table->float('sale_price', 8, 2)->nullable();
            $table->integer('weight')->nullable();
            $table->integer('quantity')->nullable();

            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('status')->nullable();

            $table->timestamps();
        });
		
        Schema::create('product_galleries', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('product_id');
            $table->string('image_path');
            $table->timestamps();
        });
        
        Schema::create('variations_attributes', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('product_id');
            $table->string('name');
            $table->timestamps();
        });
		
		Schema::create('variations_attributes_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attribute_id');
            $table->string('name');
            $table->timestamps();
        });
		
        Schema::create('variations_attributes_names', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('product_variations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->float('real_price', 8, 2);
            $table->float('sale_price', 8, 2)->nullable();
            $table->string('image');
            $table->string('weight');
            $table->string('quantity');
            $table->string('variation_name');
            $table->string('variation_attributes_name_id');
            $table->string('sku');
            $table->timestamps();
        });

        /*Schema::create('products_sku', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('product_variation')->nullable();
            $table->string('sku')->unique();
            $table->integer('qty');
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
