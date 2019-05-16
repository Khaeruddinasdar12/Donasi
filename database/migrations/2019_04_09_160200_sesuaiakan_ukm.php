<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SesuaiakanUkm extends Migration
{
    public function up()
    {
        Schema::table('ukms', function (Blueprint $table) {
        $table->string('roles');
    });
    }
    
    public function down()
    {
        Schema::table('ukms', function (Blueprint $table) {
        $table->dropColumn("roles");
        });
    }
}
