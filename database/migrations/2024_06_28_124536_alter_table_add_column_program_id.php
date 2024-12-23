<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableAddColumnProgramId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'banner',
            function (Blueprint $table) {
                $table->integer('program_id')->nullable(true);
                $table->foreign('program_id')->on('program')->references('id');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(
            'banner',
            function (Blueprint $table) {
                $table->dropForeign('banner_program_id_foreign');
                $table->dropColumn('program_id');
            }
        );
    }
}
