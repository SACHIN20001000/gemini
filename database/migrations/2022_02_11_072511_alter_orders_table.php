<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

        Schema::table('orders', function (Blueprint $table) {
            $table->enum('is_paid', ['Paid','Unpaid','Authorised','Expiring','Failed'])->after('shippingmethod')->default('Unpaid');
            $table->float('discount')->after('is_paid')->nullable();
            $table->float('sub_total')->after('sub_total')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
