<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->integer('application')->unsigned()->index();
            $table->integer('user')->unsigned()->index();
            $table->boolean('status_user')->nullable();
            $table->timestamps();

            $table->foreign('application')
                ->references('id')->on('CategoryPages')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user')
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
        Schema::dropIfExists('feedbacks');
    }
}
