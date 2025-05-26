<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('wallet_history')) {
            Schema::create('wallet_history', function (Blueprint $table) {
                $table->id();  // Auto-incrementing primary key for 'id'
                $table->char('type', 1)->default('')->comment('C:credit, D:debit');
                $table->float('amount', 8, 2)->default(0.00);
                $table->string('raw_amount', 100)->nullable();
                $table->integer('coins')->default(0);
                $table->integer('challenge_id')->default(0);
                $table->integer('user_id')->default(0);
                $table->string('status', 200);
                $table->timestamps(0); // This will create 'created_at' and 'updated_at' columns
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
        Schema::dropIfExists('wallet_history');
    }
}