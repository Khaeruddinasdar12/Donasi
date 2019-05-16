<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenyaluransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyalurans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('dokumentasi');
            $table->text('deskripsi');
            $table->integer('jumlah');
            $table->enum('penyaluran', ['umum', ' beasiswa', 'ukm']);
            $table->integer('created_by')->unsigned()->nullable();
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
        Schema::dropIfExists('penyalurans');
    }
}
