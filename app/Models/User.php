<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /*
        Este método permite traer los datos de la foreign key
        relacionada
    */
    public function profile(){
        /* 
           * El where() indica que busque el usuario con el id pasado como segundo
           * argumento y first() indica que traiga el primer registro encontrado.
           $profile = Profile::where('user_id', $this->id)->first();

           * Para acceder a ese registro se usaría user->profile

            return $profile;

            Esta forma es algo impráctica, por lo que se debe definir la consulta.
        */

        // Se puede abreviar con:
        /*
            Como argumento se hubierar podido usar un string con la ruta del
            modelo de Profile y así no habría que importar ese modelo en este.

            A tener en cuenta: si la llave foránea o la llave primaria de user no se
            llamarán, respectivamente, user_id y id, hasOne() no haría la busqueda
            ya que él hace la busqueda con nombres que cumplan esa nomenclatura.

            Para evitar esto se podría enviar como segundo argumento en cadena el
            nombre de la foreing key y como tercer argumento, de igual modo, el 
            nombre de la llave primaria de user.
        */
        return $this->hasOne(Profile::class);
    }

    // AÑADIR LA RELACIÓN UNO A MUCHOS CON posts
    public function posts(){
        /* Trae todos los datos de las llaves foráneas,
         relacionados con un usuario específico */
        return $this->hasMany('App\Models\Post');
    }

    public function videos(){
        return $this->hasMany('App\Models\Video');
    }

    public function roles(){
        /* Se le envía la ruta del modelo de la tabla
        con la relación many to many */
        return $this->belongsToMany('App\Models\Role');
    }
}
