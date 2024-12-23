<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEnrollementChangeOndelete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'user_enrollment',
            function (Blueprint $table) {
                $table->dropForeign('user_enrollment_program_id_foreign');

                $table->foreign('program_id')->on('program')->references('id')->onDelete('cascade')->onUpdate('cascade');
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
            'user_enrollment',
            function (Blueprint $table) {
                $table->dropForeign('user_enrollment_program_id_foreign');

                $table->foreign('program_id')->on('program')->references('id')->onDelete('no action')->onUpdate('no action');
            }
        );
    }
}
