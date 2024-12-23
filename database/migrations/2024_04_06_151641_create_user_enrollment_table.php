<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserEnrollmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_enrollment', function (Blueprint $table) {
            $table->id()->autoIncrement(false)->primary();
            $table->integer('mobile_user', false);
            $table->integer('program_id', false);
            $table->foreign('program_id')->references('id')->on('program');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::drop('user_enrollment');

        // Schema::table('user_enrollment', function (Blueprint $table) {
        //     $table->dropForeign('user_enrollment_program_id_foreign');
        //     $table->dropColumn('mobile_user_id');
        //     $table->dropColumn('program_id');
        // });
    }
}
