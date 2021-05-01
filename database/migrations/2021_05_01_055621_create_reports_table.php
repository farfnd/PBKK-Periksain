<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipe_laporan');
            $table->string('nama_terlapor');
            $table->string('bank');
            $table->string('nomor_rekeni',50);
            $table->string('platform',20);
            $table->string('kontak_pelaku',20);
            $table->string('kronologi', 1000);
            $table->string('total_kerugian', 30);
            $table->string('file', 1000);
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
        Schema::dropIfExists('reports');
    }
}
