<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('withdraw_requests')) {
            Schema::create('withdraw_requests', function (Blueprint $table) {
                $table->id();  // Auto-incrementing primary key 'id'
                $table->integer('payment_type_id')->default(0);
                $table->string('payment_id', 225)->default('');
                $table->string('upi', 225)->default('');
                $table->string('acc_holder_name', 50)->default('');
                $table->string('bank_name', 100)->default('');
                $table->string('acc_no', 30)->default('');
                $table->string('iban', 50)->default('');
                $table->string('ifsc_code', 30)->default('');
                $table->string('country', 50)->default('');
                $table->string('city', 50)->default('');
                $table->text('address')->nullable();
                $table->string('postcode', 30)->default('');
                $table->integer('user_id')->default(0);
                $table->integer('coins')->default(0);
                $table->string('amount', 150); // Default charset is utf8mb3
                $table->string('currency', 50); // Default charset is utf8mb3
                $table->char('currency_code', 5)->default('');
                $table->char('status', 2)->default('P')->comment('P:pending, S:success, C:completed');
                $table->timestamps(0);  // Automatically adds 'created_at' and 'updated_at'

                // Set the primary key
                // $table->primary('id');
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
        Schema::dropIfExists('withdraw_requests');
    }
}