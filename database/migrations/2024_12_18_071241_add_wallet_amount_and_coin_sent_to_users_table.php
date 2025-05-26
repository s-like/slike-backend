<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWalletAmountAndCoinSentToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                $table->integer('wallet_amount')->default(0)->after('email');  // Add wallet_amount after the 'email' column
                $table->integer('coin_sent')->default(0)->after('wallet_amount');  // Add coin_sent after 'wallet_amount'
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('wallet_amount');
            $table->dropColumn('coin_sent');
        });
    }
}