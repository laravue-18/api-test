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
            $table->foreignId('seller_id')->constrained('sellers');
            $table->string('upc_product_code');
            $table->integer('seller_orignal_quantity');
            $table->integer('seller_remaining_quantity');
            $table->string('seller_catelog_id');
            $table->float('seller_listed_price')->nullable();
            $table->float('seller_deal_price');
            $table->float('seller_lowest_deal_price');
            $table->string('seller_negotiation_mode');
            $table->date('expiry_date');
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
        Schema::dropIfExists('products');
    }
}
