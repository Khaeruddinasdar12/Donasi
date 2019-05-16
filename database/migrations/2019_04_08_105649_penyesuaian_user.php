<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PenyesuaianUser extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
        $table->enum("jkel", ['L','P']);
    });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
        $table->dropColumn("jkel");
        });
    }
}
