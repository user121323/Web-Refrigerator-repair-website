<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->text("comment");
            $table->integer("stars");
            $table->dateTime("wrotedate");
            $table->foreign("user_id")->references("id")->on("accounts")->onDelete("cascade");
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
