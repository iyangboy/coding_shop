<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductVariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id')->comment('商品ID');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->json('specification')->nullable()->comment('规格');
            $table->decimal('price', 10, 2)->default(0)->comment('价格');
            $table->unsignedInteger('stock')->default(0)->comment('库存');
            $table->boolean('online')->default(0)->comment('是否上线');
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
        Schema::dropIfExists('product_variations');
    }
}
