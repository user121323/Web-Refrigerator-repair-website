<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string("fullname");
            $table->string("login");
            $table->string("password");
            $table->bigInteger("phonenumber",false,false);
            $table->boolean("isadmin");
        });
    }

    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
