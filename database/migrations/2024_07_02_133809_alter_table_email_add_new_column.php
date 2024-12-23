<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEmailAddNewColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_email', function (Blueprint $table) {
            $table->integer('email_send_attempts_count')->after('sended');
            $table->renameColumn('sended', 'status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_email', function (Blueprint $table) {
            $table->dropColumn('email_send_attempts_count');
            $table->renameColumn('status', 'sended');
        });
    }
}
