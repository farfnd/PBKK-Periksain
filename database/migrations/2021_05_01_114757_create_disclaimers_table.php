<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisclaimersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('disclaimers', function (Blueprint $table) {
        //     $table->increments('id_sanggahan', 4);
        //     $table->integer('id_laporan', 4);
        //     $table->string('sanggahan', 1000);
        //     $table->string('file', 1000);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disclaimers');
    }
}
