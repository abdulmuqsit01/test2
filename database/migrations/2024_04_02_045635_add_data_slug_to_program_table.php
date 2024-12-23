<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\program;
use Illuminate\Support\Str;

class AddDataSlugToProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $programList = program::all();

        for ($i = 0; $i < count($programList); $i++) {
            if ($programList[$i]['slug'] == null) {
                $flight = program::find($programList[$i]['id']);
                $flight->slug = Str::slug($programList[$i]['name'], '-');
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
    }
}
