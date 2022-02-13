<?php

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeTblToFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('friends', function (Blueprint $table) {
           $table->bigInteger('contact_number');
           $table->string("profile_picture")->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists("friends");
    }
}
