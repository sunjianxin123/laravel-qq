<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index()->comment('用户id');
            $table->integer('goods_id')->index()->comment('商品id');
            $table->string('goods_sn')->comment('商品货号');
            $table->string('goods_name');
            $table->string('goods_number');
            $table->char('is_pay')->comment('1选中结算 0未选中不结算');
            $table->char('is_invalid')->comment('是否失效 F 失效 T 不失效');
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
        Schema::dropIfExists('carts');
    }
}
