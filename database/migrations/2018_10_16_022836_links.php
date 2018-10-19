<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Links extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alt_name'); //имя пльта по которому делаем отбор
            $table->string('bir_name'); //текст в ссылке
            $table->string('link'); //ссылка

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
        //
    }
}
