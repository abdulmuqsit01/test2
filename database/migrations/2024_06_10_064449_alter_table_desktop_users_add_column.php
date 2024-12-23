<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableDesktopUsersAddColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dekstop_users', function (Blueprint $table) {
            $table->dropColumn('alamat');
            $table->string('kabupaten')->nullable(true);
            $table->string('provinsi')->nullable(true);
            $table->string('kecamatan')->nullable(true);
            $table->string('deskel')->nullable(true);
            $table->string('id_address')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dekstop_users', function (Blueprint $table) {
            $table->string('alamat');
            $table->dropColumn('kabupaten');
            $table->dropColumn('provinsi');
            $table->dropColumn('kecamatan');
            $table->dropColumn('deskel');
            $table->dropColumn('id_address');
        });
    }
}
