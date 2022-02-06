<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableInfoWebsite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_website', function (Blueprint $table) {
            $table->id();
            $table->string('nama_aplikasi');
            $table->string('nama_singkatan')->nullable();
            $table->longText('tentang')->nullable();
            $table->string('alamat')->nullable();
            $table->text('maps')->nullable();
            $table->text('logo')->nullable();
            $table->text('logo_mini')->nullable();
            $table->string('footer')->nullable();
            $table->longText('kontak')->nullable();
            $table->longText('sosial_media')->nullable();
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
        Schema::dropIfExists('info_website');
    }
}
