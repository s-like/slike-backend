<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoGiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('video_gifts')) {
            Schema::create('video_gifts', function (Blueprint $table) {
                $table->id();  // Auto-incrementing primary key 'id'
                $table->integer('from_id')->default(0);
                $table->integer('to_id')->default(0);
                $table->integer('video_id')->default(0);
                $table->integer('gift_id')->default(0);
                $table->integer('coins')->default(0);
                $table->char('type', 1)->default('P')->comment('V:video, S:stream');
                $table->timestamps(0);  // Automatically adds 'created_at' and 'updated_at'

            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_gifts');
    }
}