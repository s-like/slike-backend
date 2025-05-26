<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStreamSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stream_setting', function (Blueprint $table) {
            $table->id();
            $table->char('type',2)->default('')->comment('AM:ant media;A:agora');
            $table->string('alias',100)->default('');
            $table->string('name',100)->default('');
            $table->string('app_id',225)->default('');
            $table->string('app_certificate',225)->default('');
            $table->string('live_server_root',225)->default('');
            $table->tinyInteger('active')->default(0);
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
        Schema::dropIfExists('stream_setting');
    }
}
