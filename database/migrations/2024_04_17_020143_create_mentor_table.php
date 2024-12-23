<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentor', function (Blueprint $table) {
            $table->integer('id')->autoIncrement(false)->primary();
            $table->text('name');
            $table->text('image');
            $table->timestamps();
        });

        Schema::table('program', function (Blueprint $table) {
            $table->integer('mentor_id', false)->nullable()->after('program_categories_id');
            $table->foreign('mentor_id')->on('mentor')->references('id');
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
            $table->dropForeign('program_mentor_id_foreign');
            $table->dropColumn('mentor_id');
        });
        Schema::dropIfExists('mentor');
    }
}
