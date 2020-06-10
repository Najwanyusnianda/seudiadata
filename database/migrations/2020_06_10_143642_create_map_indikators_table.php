<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapIndikatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_indikators', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('subject_id');
            $table->string('indikator');
            $table->text('ulasan')->nullable();
            $table->text('data')->nullable();
           // $table->string('graph_type')->nullable();
            $table->text('title')->nullable();
            $table->text('subtitle')->nullable();
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
        Schema::dropIfExists('map_indikators');
    }
}
