<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    // Esto permite la asignación vacía
    protected $guarded = [];

    use HasFactory;

    // El método se debe llamar como el prefijo
    // de las llaves compuestas 
    public function imageable(){
        /*
            Esta función es la que permite establecer
            la relación de uno a uno polimórfica.
        */
        return $this->morphTo();
    }
}
