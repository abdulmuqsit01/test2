<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEditIdToNonIncrement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('program', function (Blueprint $table) {
            $table->dropForeign('program_instansi_id_foreign');
        });

        Schema::table('program', function (Blueprint $table) {
            $table->integer('id', 8)->autoIncrement(false)->change();
            $table->integer('instansi_id', 8)->change();
        });

        Schema::table('instansi', function (Blueprint $table) {
            $table->integer('id', 8)->autoIncrement(false)->change();
        });

        Schema::table('program', function (Blueprint $table) {
            $table->foreign('instansi_id')->on('instansi')->references('id');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->integer('id', 8)->autoIncrement(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('program', function (Blueprint $table) {
            $table->dropForeign('program_instansi_id_foreign');
        });

        Schema::table('program', function (Blueprint $table) {
            $table->bigInteger('id', 20)->autoIncrement(true)->change();
            $table->bigInteger('instansi_id', 20)->autoIncrement(false)->change();
        });

        Schema::table('instansi', function (Blueprint $table) {
            $table->bigInteger('id', 20)->autoIncrement(true)->change();
        });

        Schema::table('program', function (Blueprint $table) {
            $table->foreign('instansi_id')->on('instansi')->references('id');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('id', 20)->autoIncrement(true)->change();
        });
    }
}
