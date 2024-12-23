<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUnseEnrollmentAddColumnLoKantorPos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_enrollment', function (Blueprint $table) {
            $table->string('lokasi_kantor_pos')->after('id_address');
        });
        Schema::table('table_email', function (Blueprint $table) {
            $table->string('lokasi_kantor_pos')->after('status');
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
            $table->dropColumn('lokasi_kantor_pos');
        });
        Schema::table('table_email', function (Blueprint $table) {
            $table->dropColumn('lokasi_kantor_pos');
        });
    }
}
