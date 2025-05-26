<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('payment_history')) {
            Schema::create('payment_history', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('user_id')->default(0);
                $table->string('product_id', 100)->default('');
                $table->string('status', 20)->default('');
                $table->float('amount', 8, 2)->nullable();
                $table->string('raw_amount', 50)->charset('utf8mb3')->collation('utf8mb3_general_ci');
                $table->unsignedInteger('coins')->default(0);
                $table->string('transaction_id', 225)->default('');
                $table->string('transaction_date', 100)->default('');
                $table->string('source', 20)->default('');
                $table->text('message')->nullable();
                $table->timestamps(); // This adds `created_at` and `updated_at` columns
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
        Schema::dropIfExists('payment_history');
    }
}