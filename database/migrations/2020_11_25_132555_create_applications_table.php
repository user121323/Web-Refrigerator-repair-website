<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->string("street");
            $table->string("housenumber");
            $table->dateTime("timeofapplication");
            $table->boolean("done");
            $table->foreign("user_id")->references("id")->on("accounts")->onDelete("cascade");
        });
    }

    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
