<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_holder_name')->nullable();
            $table->boolean('status')->default(false);
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_accounts');
    }
}
