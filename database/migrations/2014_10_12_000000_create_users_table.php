<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('refer_id')->nullable();
            $table->string('placement_hand')->nullable();
            $table->string('placement_id')->nullable();
            $table->string('nid')->nullable();
            $table->string('avatar')->nullable();
            $table->string('password');
            $table->text('firebase_token')->nullable();
            $table->text('address')->nullable();
            $table->enum('user_type',['free','premium'])->default('free');
            $table->enum('gender',['Male','Female','Other'])->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
