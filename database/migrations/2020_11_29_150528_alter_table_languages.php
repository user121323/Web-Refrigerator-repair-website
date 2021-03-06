<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableLanguages extends Migration
{
    public function up()
    {
        Schema::table('languages', function (Blueprint $table) {
            $table->unique("code");
        });
    }

    public function down()
    {
        Schema::table('languages', function (Blueprint $table) {
            //
        });
    }
}
