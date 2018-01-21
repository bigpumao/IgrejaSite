<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('titulo');
            $table->string('horas');
            $table->string('semana');
            $table->string('imagem')->default('eventos.jpg');
            $table->boolean('checkbox')->default(false);
            $table->string('local');
            $table->string('data_inicio');
            $table->string('data_fim');
            $table->text('descricao');
            $table->integer('visualizacao')->default('0');
            $table->boolean('status')->default(false);
            $table->boolean('expirar')->default(true);
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
        Schema::dropIfExists('eventos');
    }
}
