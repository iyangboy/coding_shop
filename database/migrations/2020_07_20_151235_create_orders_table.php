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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index()->nullable()->comment('下单的用户 ID');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('cart_id')->index()->nullable()->comment('购物车 ID');
            $table->string('status')->default('pending')->index()->comment('订单状态');

            $table->unsignedBigInteger('address_id')->nullable()->comment('地址 ID');
            $table->text('address')->nullable()->comment('JSON 格式的收货地址');
            $table->decimal('total', 10, 2)->comment('订单总金额');
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
