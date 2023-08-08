<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atraso extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_atraso',
        'hora_atraso',
        'user_id',
        'hora_entrada',
        'justifica'
    ];



    /*
     * Relaciones
     * */

    public function estudiante()
    {
       return $this->hasOne(User::class,'id','user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function horaEntrada()
    {
        return $this->hasOne(HorasDeEntrada::class,'id','hora_entrada');
    }

    public function minutosAtraso()
    {

        $atraso = Atraso::find($this->id);

        $he =Carbon::parse(HorasDeEntrada::find($atraso->hora_entrada)->hora);
        $hl =Carbon::parse($atraso->hora_atraso);
        $diferenciaHoras = $he->diffInMinutes($hl);

        $minutos=$diferenciaHoras;
        return $minutos;
    }



}
