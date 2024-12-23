<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUserAddColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('program', function (Blueprint $table) {
            $table->longText('description')->change();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->nullable(true);
            $table->integer('instansi_id')->nullable(true);
            $table->foreign('instansi_id')->on('instansi')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');

            $table->dropForeign('users_instansi_id_foreign');
            $table->dropColumn('instansi_id');
        });

        Schema::table('program', function (Blueprint $table) {
            $table->text('description')->change();
        });
    }
}
