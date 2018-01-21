<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumDepartamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_departamento', function (Blueprint $table) {
            $table->integer('departamento_id')->unsigned();
            $table->integer('album_id')->unsigned();

            $table->foreign('departamento_id')
            ->references('id')
            ->on('departamentos')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('album_id')
            ->references('id')
            ->on('albums')
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
        Schema::dropIfExists('album_departamento');
    }
}
