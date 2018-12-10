<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeoplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 128);
            $table->string('lastname', 128);
            $table->integer('age')->unsigned();
            $table->enum('gender', ['male', 'female']);
            $table->string('email', 128);
            $table->integer('job_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->mediumText('opinion');
            $table->enum('calification', [1,2,3,4,5]);
            $table->timestamps();

            //Relationships
            $table->foreign('job_id')->references('id')->on('jobs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('city_id')->references('id')->on('cities')
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
        Schema::dropIfExists('people');
    }
}
