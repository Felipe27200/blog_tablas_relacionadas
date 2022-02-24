<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Traer los datos de la tabla fuerte users
    // RElacion uno a muchos (inversa)
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    // Traer los datos de la tabla fuerte categorias
    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }

    // Relación uno a uno polimórfica
    public function image(){
        /*
            El primer argumento es la ruta del modelo, y el segundo
            es el método que genera la relación polimórfica entre las
            tablas.

            morphOne() es una para una relación uno a uno.
        */
        return $this ->morphOne('App\Models\Image', 'imageable');
    }
}
