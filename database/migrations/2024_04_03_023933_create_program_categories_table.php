<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_categories', function (Blueprint $table) {
            $table->integer('id')->autoIncrement(false)->primary();

            $table->text('name');

            $table->timestamps();
        });

        Schema::table('program', function (Blueprint $table) {
            $table->integer('program_categories_id')->after('instansi_id')->nullable();
            $table->foreign('program_categories_id')->references('id')->on('program_categories');
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
            $table->dropForeign('program_program_categories_id_foreign');
        });

        Schema::table('program', function (Blueprint $table) {
            $table->dropColumn('program_categories_id');
        });

        Schema::drop('program_categories');
    }
}
