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
            $table->string('user_id', 1024)->nullable();
            $table->string('tipe_laporan');
            $table->smallInteger('terverifikasi')->default(0);
            $table->string('nama_terlapor');
            $table->string('bank')->nullable();
            $table->string('nomor_rekening', 50)->nullable();
            $table->string('platform', 20)->nullable();
            $table->string('kontak_pelaku', 20);
            $table->string('kronologi', 1000);
            $table->string('total_kerugian', 30);
            $table->string('file_bukti', 1000)->nullable();
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
