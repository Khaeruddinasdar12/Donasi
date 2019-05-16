<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PenyesuaianTableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('users', function (Blueprint $table) {
        $table->string("nohp");
        $table->string("foto")->nullable();
        $table->string("pekerjaan");
        $table->string("alamat");
        $table->enum("status",['active', 'inactive']);
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
        $table->dropColumn("nohp");
        $table->dropColumn("foto");
        $table->dropColumn("pekerjaan");
        $table->dropColumn("alamat");
        $table->dropColumn("status");
        });
    }
}
