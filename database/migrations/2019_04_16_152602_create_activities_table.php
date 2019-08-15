<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('模板名称');
            $table->string('title')->comment('活动标题');
            $table->char('in_pc')->comment('是否是PC活动 T是;F否');
            $table->char('in_app')->comment('是否是APP活动 T是;F否');
            $table->string('pc_banner')->comment('PC活动banner');
            $table->string('bg_color')->comment('背景颜色');
            $table->char('is_show')->comment('是否显示');
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
        Schema::dropIfExists('activities');
    }
}
