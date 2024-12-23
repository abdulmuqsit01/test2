<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEmail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_email', function (Blueprint $table) {
            $table->id();

            $table->text('destination_email');
            $table->text('from');
            $table->text('call_center')->nullable(true);
            $table->text('alamat');
            $table->text('program');
            $table->text('instansi');
            $table->text('nama');
            $table->text('no_hp');
            $table->text('url')->nullable(true);
            $table->text('instanceEmail')->nullable(true);
            $table->timestamp('sended_at')->nullable(true);
            $table->boolean('sended')->nullable(true)->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_email');
    }
}
