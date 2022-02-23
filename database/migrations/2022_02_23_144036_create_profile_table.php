<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            // Crea un campo para un número grande sin sigo
            $table->id();

            // El primer argumento es el nombre de la columna, el segundo su tamaño máximo
            $table->string('title', 45);
            $table->text('biografia');
            $table->string('website', 45);

            // campo para almacenar la llave foránea, unsigned establece sin signo
            // unique() indica que sólo podrá haber una llave fóranea con ese valor
            // así se establece la relación de uno a uno
            $table->unsignedBigInteger('user_id')->unique();

            // foreign() establece que el campo entre sus paréntesis es una llave foránea
            // references() indica que esa llave foránea hace referencia al id
            // de la tabla user, indicada por el on()
            $table->foreign('user_id')->references('id')->on('users')
            // Establece que si se elimina la llave primaria en user, entonces,
            // también se eliminara el registro en la tabla que alberga la foreign key
            ->onDelete('cascade')
            // Establece que si la llave primaria cambia entonces, la foreign también 
            // cambiara a ese valor, para siempre estar relacionada al mismo registro
            ->onUpdate('cascade');

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
        Schema::dropIfExists('profile');
    }
}
