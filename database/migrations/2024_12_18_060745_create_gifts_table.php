<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('gifts')) {
            Schema::create('gifts', function (Blueprint $table) {
                $table->increments('id'); // AUTO_INCREMENT PRIMARY KEY
                $table->string('name', 200)->default(''); // name field
                $table->string('icon', 200)->default(''); // icon field
                $table->integer('coins')->default(0); // coins field
                $table->timestamps(0); // created_at and updated_at columns, defaults to NULL
                $table->boolean('active')->default(false); // active field (tinyint(1))
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
        Schema::dropIfExists('gifts');
    }
}