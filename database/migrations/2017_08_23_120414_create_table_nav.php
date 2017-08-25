<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNav extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('portal_id')->unsigned();
            $table->integer('parent_id')->unsigned();
            $table->string('nav_title');
            $table->string('nav_url');
            $table->integer('nav_no');
            $table->enum('active_st', ['0', '1']);
            $table->enum('display_st', ['0', '1']);
            $table->string('nav_icon')->nullable();
            $table->enum('nav_st', ['external', 'internal']);
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('portal_id')
                ->references('id')
                ->on('portals')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('navs');
    }
}
