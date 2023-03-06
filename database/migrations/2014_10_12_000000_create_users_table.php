<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->longText('referral_link')->nullable();
            $table->longText('referral_by')->nullable();
            $table->integer('wallet')->nullable();
            $table->integer('referral_bonus')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('status')->default(false);
            $table->string('current_rank')->nullable();
            $table->integer('current_level')->nullable();
            $table->integer('total_referrals')->nullable();
            $table->boolean('is_manager')->default(0);
            $table->integer('manager_amount')->nullable();
            $table->integer('level_1_amount')->nullable();
            $table->integer('level_1_users_count')->nullable();
            $table->integer('level_2_amount')->nullable();
            $table->integer('level_2_users_count')->nullable();
            $table->integer('level_3_amount')->nullable();
            $table->integer('level_3_users_count')->nullable();
            $table->integer('level_4_amount')->nullable();
            $table->integer('level_4_users_count')->nullable();
            $table->integer('level_5_amount')->nullable();
            $table->integer('level_5_users_count')->nullable();
            $table->integer('level_6_amount')->nullable();
            $table->integer('level_6_users_count')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
