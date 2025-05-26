<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CommentStreamId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('comments', 'stream_id')) {
            Schema::table('comments', function (Blueprint $table) {
                $table->integer('stream_id')->default(0);
            });
        }

        if (!Schema::hasColumn('comments', 'type')) {
            Schema::table('comments', function (Blueprint $table) {
                $table->char('type',1)->default('V')->comment('V:video,S:stream');
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
