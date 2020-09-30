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
            $table->foreignId('product_category_id')->constrained('product_categories');
            $table->string('product_slug')->unique();
            $table->string('product_title');
            $table->string('product_short_description')->nullable();
            $table->string('product_description')->nullable();
            $table->string('product_image');
            $table->double('product_price');
            $table->double('product_offer_price');
            $table->string('product_type');
            $table->string('product_sku')->nullable();
            $table->integer('product_status')->default(1);
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
