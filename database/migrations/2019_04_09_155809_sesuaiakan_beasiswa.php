<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SesuaiakanBeasiswa extends Migration
{
    public function up()
    {
        Schema::table('beasiswas', function (Blueprint $table) {
        $table->string('roles');
    });
    }
    
    public function down()
    {
        Schema::table('beasiswas', function (Blueprint $table) {
        $table->dropColumn("roles");
        });
    }
}
