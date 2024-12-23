<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\program_categories as categories;
use Illuminate\Support\Str;

class AddDataSlugToProgramCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categoriList = categories::all();

        for ($i = 0; $i < count($categoriList); $i++) {

            if ($categoriList[$i]['slug'] == null) {
                $flight = categories::find($categoriList[$i]['id']);
                $flight->slug = Str::slug($categoriList[$i]['name'], '-');
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
        Schema::table('program_categories', function (Blueprint $table) {
            //
        });
    }
}
