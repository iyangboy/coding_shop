<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->comment('所属的用户 ID');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('location')->nullable()->comment('地址信息');
            $table->boolean('default')->default(true)->comment('是否为默认地址');

            $table->string('province')->nullable()->comment('省');
            $table->string('city')->nullable()->comment('市');
            $table->string('district')->nullable()->comment('区');
            $table->string('address')->nullable()->comment('具体地址');
            $table->unsignedInteger('zip')->nullable()->comment('邮编');

            $table->string('contact_name')->nullable()->comment('联系人姓名');
            $table->string('contact_phone')->nullable()->comment('联系人电话');
            $table->dateTime('last_used_at')->nullable()->comment('最后一次使用时间');
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
        Schema::dropIfExists('user_addresses');
    }
}
