<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGeminiApiKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('app_settings', 'gemini_api_key')) {
            Schema::table('app_settings', function (Blueprint $table) {
                $table->string('gemini_api_key')->default('')->comment('Gemini API key for AI'); // use this for field after specific column.
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
