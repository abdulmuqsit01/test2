<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\instansi_model;
use Illuminate\Support\Str;

class AddDataSlugToInstansiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $instanceList = instansi_model::all();

        for ($i = 0; $i < count($instanceList); $i++) {

            if ($instanceList[$i]['slug'] == null) {
                $flight = instansi_model::find($instanceList[$i]['id']);
                $flight->slug = Str::slug($instanceList[$i]['name'], '-');
                $flight->save();
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('instansi', function (Blueprint $table) {
        //     //
        // });
    }
}
