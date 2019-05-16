<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donasis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('email');
            $table->string('nohp');
            $table->integer('confirm_by')->unsigned()->nullable();
            $table->string('pekerjaan');
            $table->enum('status', ['sampai','belum']);
            $table->integer('jumlah');
            $table->string('foto')->nullable();
            $table->timestamps();
            $table->foreign('confirm_by')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donasis');
    }
}
