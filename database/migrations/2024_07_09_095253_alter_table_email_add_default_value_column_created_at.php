<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AlterTableEmailAddDefaultValueColumnCreatedAt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::table('table_email')
            ->whereNull('created_at')
            ->update(['created_at' => DB::raw("'2024-06-24 10:46:08'")]);

        DB::table('table_email')
            ->whereNull('updated_at')
            ->update(['updated_at' => DB::raw("'2024-06-24 10:46:08'")]);

        Schema::table('table_email', function (Blueprint $table) {
            DB::statement('ALTER TABLE table_email MODIFY updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL');
            DB::statement('ALTER TABLE table_email MODIFY created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE table_email MODIFY updated_at TIMESTAMP NULL DEFAULT NULL');
        DB::statement('ALTER TABLE table_email MODIFY created_at TIMESTAMP NULL DEFAULT NULL');
    }
}
