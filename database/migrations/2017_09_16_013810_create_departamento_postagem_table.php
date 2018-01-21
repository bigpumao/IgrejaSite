<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartamentoPostagemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamento_postagem', function (Blueprint $table) {
           $table->integer('departamento_id')->unsigned();
           $table->integer('postagem_id')->unsigned();

           $table->foreign('departamento_id')
               ->references('id')
               ->on('departamentos')
               ->onDelete('cascade')
               ->onUpdate('cascade');

           $table->foreign('postagem_id')
               ->references('id')
               ->on('postagems')
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
        Schema::dropIfExists('departamento_postagem');
    }
}
