<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToTableWaktu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('waktu', function (Blueprint $table) {
            $table->unsignedBigInteger('mapel_id')->after('id');
            $table->foreign('mapel_id')->references('id')->on('mapel')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('waktu', function (Blueprint $table) {
            //
        });
    }
}
