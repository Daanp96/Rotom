<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('banner')->default("/img/banner_placeholder.jpg");
            $table->string('avatar')->default("/img/pfp_placeholder.png");
            $table->string('ringtone')->default('Default Beltoon');
            $table->string('door_access');
            $table->boolean('priority');
            $table->foreign('ringtone')->references('title')->on('ringtone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact');
    }
}
