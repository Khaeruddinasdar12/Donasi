<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonasiusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donasiusers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jumlah');
            $table->string('foto')->nullable();
            $table->enum('status', ['sampai', 'belum', 'proses']);
            $table->integer('iduser')->unsigned()->nullable();
            $table->integer('confirm_by')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('iduser')->references('id')->on('users');
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
        Schema::dropIfExists('donasiusers');
    }
}
