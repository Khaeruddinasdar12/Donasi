<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUkmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ukms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_penerima');
            $table->string('nama_usaha');
            $table->text('deskripsi');
            $table->integer('jumlah_awal');
            $table->integer('jumlah_total')->nullable();
            $table->string('dokumentasi');
            $table->enum('status', ['active','inactive']);
            $table->integer('lama');
            $table->integer('created_by')->unsigned();
            $table->string('updated_by')->nullable();
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ukms');
    }
}
