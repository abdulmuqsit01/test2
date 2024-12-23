<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableProgramCategoriesAddColumnThumbnail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('program_categories', function (Blueprint $table) {
            $table->string('thumbnail')->after('image')->nullable(true);
            $table->string('slug')->after('thumbnail')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('program_categories', function (Blueprint $table) {
            $table->dropColumn('thumbnail');
            $table->dropColumn('slug');
        });
    }
}
