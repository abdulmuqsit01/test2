<?php

use App\Models\EmailModel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterTableEmailAddColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_email', function (Blueprint $table) {
            $table->string('sended')->change();
        });

        Schema::table('table_email', function (Blueprint $table) {
            $queryId = 'SELECT id FROM table_email';
            $data = DB::select($queryId);

            for ($i = 0; $i < count($data); $i++) {
                $query = 'UPDATE table_email SET sended=CASE WHEN sended=1 THEN "sended" WHEN sended=0 THEN "failed" ELSE "failed" END where id=?;';

                DB::statement($query, [$data[$i]->id]);
            }
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
            $table->boolean('sended')->change();
        });
    }
}
