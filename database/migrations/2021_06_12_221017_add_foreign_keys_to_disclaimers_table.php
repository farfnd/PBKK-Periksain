<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDisclaimersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('disclaimers', function (Blueprint $table) {
            $table->foreign('id_laporan', 'disclaimers_ibfk_1')->references('id')->on('reports')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('disclaimers', function (Blueprint $table) {
            $table->dropForeign('disclaimers_ibfk_1');
        });
    }
}
