<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dialog')->unsigned()->index();
            $table->text('message');
            $table->integer('id_from');
            $table->integer('id_to');
            $table->timestamps();


            $table->foreign('dialog')
                ->references('id')->on('dialogs')
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
        Schema::dropIfExists('messages');
    }
}
