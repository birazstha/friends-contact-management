<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendsTable extends Migration
{

    public function up()
    {
        Schema::create('friends', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('email')->unique();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('friends');
    }
}
