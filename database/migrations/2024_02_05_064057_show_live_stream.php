<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ShowLiveStream extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('app_settings', 'show_live_stream')) {
            Schema::table('app_settings', function (Blueprint $table) {
                $table->tinyInteger('show_live_stream')->default(1)->nullable()->comment('0:all, 1:only followers'); // use this for field after specific column.
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
        //
    }
}
