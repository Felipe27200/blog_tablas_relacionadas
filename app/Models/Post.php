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
}
