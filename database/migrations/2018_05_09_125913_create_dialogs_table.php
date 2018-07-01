<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDialogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dialogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_1')->unsigned()->index();
            $table->integer('id_2')->unsigned()->index();
            $table->timestamps();


            $table->foreign('id_1')
                ->references('id')->on('users')
                ->onDelete('cascade')
            ->onUpdate('cascade');


            $table->foreign('id_2')
                ->references('id')->on('users')
                ->onDelete('cascade')
            ->onUpdate('cascade');


        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dialogs');
    }
}
