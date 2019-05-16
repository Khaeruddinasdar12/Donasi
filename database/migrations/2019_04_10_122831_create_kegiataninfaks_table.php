<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKegiataninfaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiataninfaks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nama_kegiatan')->unsigned();
            $table->text('deskripsi');
            $table->integer('jumlah');
            $table->integer('created_by')->unsigned();
            $table->string('updated_by')->nullable();
            $table->string('dokumentasi');
            $table->timestamps();
            $table->string('roles');
            $table->foreign('created_by')->references('id')->on('admins');
            $table->foreign('nama_kegiatan')->references('id')->on('prokers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kegiataninfaks');
    }
}
