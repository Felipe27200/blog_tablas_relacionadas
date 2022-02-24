<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tabla que almacena datos comunes con relación polimórfica uno a uno
        Schema::create('images', function (Blueprint $table) {
            $table->string('url');

            // id de la llave primaria
            $table->unsignedBigInteger('imageable_id');
            $table->string('imageable_type'); // Almacena la ruta del modelo

            // Establece que ambos campos son una llave compuesta
            // por lo que no es necesario que la tabla tenga un id
            $table->primary(['imageable_id', 'imageable_type']);

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
        Schema::dropIfExists('images');
    }
}
