<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beasiswas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_penerima');
            $table->text('deskripsi');
            $table->string('dokumentasi');
            $table->integer('jumlah_persemester');
            $table->integer('jumlah_total')->nullable();
            $table->integer('lama');
            $table->enum('pendidikan', ['S1', 'D3']);
            $table->enum('status', ['active', 'inactive']);
            $table->integer('id_mitra')->unsigned();
            $table->integer('created_by')->unsigned();
            $table->string('updated_by')->nullable();
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('admins');
            $table->foreign('id_mitra')->references('id')->on('mitras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beasiswas');
    }
}
