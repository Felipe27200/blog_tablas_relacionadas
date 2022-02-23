<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->text('body');
            // nullable() indica que el campo puede tener valores nulos
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('categoria_id')->nullable();

            // Estableciendo la llave foránea de user_id
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    /* Cuando se elimine el registro en la tabla fuerte
                    el valor de la llave foránea pasará a ser null,
                    así no se elimina el registroen posts */
                    ->onDelete('set null');

            $table->foreign('categoria_id')
                    ->references('id')
                    ->on('categorias')
                    ->onDelete('set null');

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
        Schema::dropIfExists('posts');
    }
}
