<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableDekstopUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_enrollment', function (Blueprint $table) {
            $table->integer('mobile_user', false)->nullable(true)->change();
        });

        Schema::create('dekstop_users', function (Blueprint $table) {
            $table->integer('id')->autoIncrement(false)->primary();
            $table->text('nama');
            $table->text('alamat');
            $table->bigInteger('no_hp');
            $table->string('platform');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('dekstop_users');

        Schema::table('user_enrollment', function (Blueprint $table) {
            $table->integer('mobile_user', false)->nullable(false)->change();
        });
    }
}
