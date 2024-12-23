<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBanner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table(
            'interests',
            function (Blueprint $table) {

                $table->dropForeign('interests_categories_id_foreign');

                $table->foreign('categories_id')->on('program_categories')->references('id')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('banner');

        Schema::table(
            'interests',
            function (Blueprint $table) {
                $table->dropForeign('interests_categories_id_foreign');
                $table->foreign('categories_id')->on('program_categories')->references('id')->onDelete('no action')->onUpdate('no action');
            }
        );
    }
}
