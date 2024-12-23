<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableInstanceAddColumnEmailAndCallCenter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instansi', function (Blueprint $table) {
            $table->string('email')->nullable(true);
        });

        Schema::table('program', function (Blueprint $table) {
            $table->string('call_center')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instansi', function (Blueprint $table) {
            $table->dropColumn('email');
        });

        Schema::table('program', function (Blueprint $table) {
            $table->dropColumn('call_center');
        });
    }
}
