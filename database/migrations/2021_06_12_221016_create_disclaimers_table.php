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
        Schema::create('disclaimers', function (Blueprint $table) {
            $table->increments('id_sanggahan');
            $table->unsignedInteger('id_laporan')->index('id_laporan');
            $table->integer('user_id')->nullable();
            $table->string('sanggahan', 1000);
            $table->string('file', 1000)->nullable();
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
        Schema::dropIfExists('disclaimers');
    }
}
