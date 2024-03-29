<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Searchable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'paterno',
        'materno',
        'nombrecompleto',
        'rut',
        'dv',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//    public function getRememberTokenName()
//    {
//        return 'rut';
//    }

//Searchable data
    public function toSearchableArray(){

        return[
            'rut'=>$this->rut,
        ];

    }





    /**Relaciones**/
    /**
     * Obtiene todos los chirps del usuario
     * relaciona los chirps con el usuario
    */

    public function chirps(){
        return $this->hasMany(Chirp::class);
    }


    public function curso(){
        return $this->belongsTo(Curso::class);
    }

    public function atrasos()
    {
        return $this->hasMany(Atraso::class);
    }
}
