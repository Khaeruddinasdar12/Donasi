<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prokers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kegiatan');
            $table->text('deskripsi');
            $table->integer('created_by')->unsigned();
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
        Schema::dropIfExists('prokers');
    }
}
