<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PenyesuaianDonasis extends Migration
{
    public function up()
    {
        Schema::table('donasis', function (Blueprint $table) {
        $table->enum("jkel", ['L','P']);
    });
    }
    
    public function down()
    {
        Schema::table('donasis', function (Blueprint $table) {
        $table->dropColumn("jkel");
        });
    }
}
