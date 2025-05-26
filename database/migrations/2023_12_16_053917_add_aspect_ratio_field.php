<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAspectRatioField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
     {
        if (!Schema::hasColumn('videos', 'aspect_ratio')) {
            Schema::table('videos', function (Blueprint $table) {
                $table->double('aspect_ratio', 2, 2)->default(1.0)->nullable(); // use this for field after specific column.
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
        Schema::table('videos', function (Blueprint $table) {
            //
        });
    }
}


