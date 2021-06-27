<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportRekeningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('laporan_rekening');
        
        Schema::create('laporan_rekening', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('tipe_laporan');
            $table->string('nama_terlapor');
            $table->string('bank')->nullable();
            $table->string('nomor_rekening', 50)->nullable();
            $table->string('platform', 20)->nullable();
            $table->string('kontak_pelaku', 20);
            $table->string('kronologi', 1000);
            $table->string('total_kerugian', 30);
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
        Schema::dropIfExists('laporan_rekening');
    }
}
