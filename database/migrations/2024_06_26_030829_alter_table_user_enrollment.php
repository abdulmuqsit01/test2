<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUserEnrollment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_enrollment', function (Blueprint $table) {
            $table->text('nama');
            $table->text('alamat')->nullable(true);
            $table->string('no_hp');
            $table->string('email');
            $table->string('kabupaten')->nullable(true);
            $table->string('provinsi')->nullable(true);
            $table->string('kecamatan')->nullable(true);
            $table->string('id_address')->nullable(true);

            $table->timestamps();
        });

        Schema::table('dekstop_users', function (Blueprint $table) {
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_enrollment', function (Blueprint $table) {
            $table->dropColumn('nama');
            $table->dropColumn('alamat');
            $table->dropColumn('no_hp');
            $table->dropColumn('email');
            $table->dropColumn('kabupaten')->nullable(true);
            $table->dropColumn('provinsi')->nullable(true);
            $table->dropColumn('kecamatan')->nullable(true);
            $table->dropColumn('id_address')->nullable(true);
        });
    }
}
