<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Blog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::dropIfExists('blog');
        Schema::create('blog', function(Blueprint $table){
            $table->id();
            $table->string('title');
            $table->longtext('description');
            $table->string('type')->nullable();
            $table->text('link')->nullable();
            $table->string('rp_version')->nullable();
            $table->string('min_engine_version')->nullable();
            $table->string('status')->nullable();
            $table->longtext('img')->nullable();




            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('blog');
    }
}
