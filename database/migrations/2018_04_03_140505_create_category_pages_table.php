<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoryPages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_category');
            $table->integer('language');
            $table->integer('language_translation');
            $table->integer('price')->nullable();
            $table->integer('complexity')->nullable();
            $table->date('date_start');
            $table->date('date_finish');
            $table->text('ad')->nullable();
            $table->text('category_pages')->nullable();
            $table->string('img',50)->nullable();
            $table->integer('user')->nullable();
            $table->string('link',255)->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('categoryPages');
    }
}
