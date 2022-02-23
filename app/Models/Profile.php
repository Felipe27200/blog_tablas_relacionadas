<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public function user(){
        /* 
            * Se usa find(), ya que se quiere buscar un usuario, según su id.
            * Este se pasa como argumento, gracias al valor de la foreign key.

            $user = User::find($this->user_id); 

            return $user;
        */

        /*
            Es similar a la busqueda anterior.

            De igual manera, si los campos tuvieran nombres distintos a la convención,
            habría que enviar sus identificadores como cadenas al método.
        */
        return $this->belongsTo('App\Models\User');
    }
}
