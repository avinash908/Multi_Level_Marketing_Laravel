<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_profiles', function (Blueprint $table) {
            $table->id();
            $table->text('logo')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('facebook')->nullable();
            $table->string('intro')->nullable();
            $table->string('instagram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->integer('all_members')->nullable();
            $table->integer('total_deposit')->nullable();
            $table->integer('world_country')->nullable();
            $table->boolean('internal_money_transfer')->default(0);
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
        Schema::dropIfExists('app_profiles');
    }
}
