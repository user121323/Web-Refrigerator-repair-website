<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesNewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {{
            $table->id();
            $table->string("name");
            $table->text("description");
            $table->integer("price");
            $table->unsignedBigInteger("services_language_id");
            $table->foreign("services_language_id")->references("id")->on("languages")->onDelete("cascade");

        }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services_new');
    }
}
