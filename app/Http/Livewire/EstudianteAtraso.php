<?php

namespace App\Http\Livewire;

use App\Models\Atraso;
use App\Models\HorasDeEntrada;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class EstudianteAtraso extends Component
{
    public $busqueda;
    public $datos;
    public $entrada;
    public $ultimaEntrada;
    public $selectedOption;
    public $selectedOptionId;
    public $horaDeLlegada;
    public $mensaje5seg = true;
    public $justifica;



    public function render()
    {
/*        $this->datos = User::with('curso')->where('rut', 'like', '18233435')->get();*/
        $this->entrada = HorasDeEntrada::all();

        return view('livewire.estudiante-atraso',
            [
                'datos' => $this->datos,
                'entradas' => $this->entrada,
                'diferencia' => $this->diferenciaMinutos(),
            ]);
    }

    public function buscar()
    {
        if (strlen($this->busqueda)>7) {

            /*
             * $this->datos = User::with('curso')->where('rut', 'like', '18233435')->get();
            */

            $this->datos = User::with('curso')->where('rut', 'like', '%'.$this->busqueda.'%')->get();
            if(count($this->datos)>0 && $this->datos[0]->curso == null){
                $this->datos = null;
            }
        } else {
            $this->datos = null;
        }
    }

    public function diferenciaMinutos()
    {

        if($this->selectedOption ==  $this->ultimaEntrada){
            $ultimaEntrada = Carbon::parse($this->ultimaEntrada);
            $diferencia = now()->diffInMinutes($ultimaEntrada);
        }else{
            $ultimaEntrada = Carbon::parse($this->selectedOption);
            $diferencia = now()->diffInMinutes($ultimaEntrada);
        }
        return $diferencia;
    }



    /*
     * con MOUNT se carga la pagina y este metodo envia los parametros por defecto
     *
     * Ultima entrada guarda la ultima hora de entrada utilizada para registrarla en nuevos atrasos
    */
    public function mount()
    {
        $this->horaDeLlegada = now();
        $entrada=HorasDeEntrada::all();
        foreach ($entrada as $e){
            if($e->ultimousosn){
                $this->ultimaEntrada=$e->hora;
            }
        }

        $this->selectedOption = $this->ultimaEntrada; // Establecer el valor por defecto
    }

    public function createAtraso()
    {


        $this->selectedOptionId = HorasDeEntrada::where('hora',$this->selectedOption)->get();


        $atraso = new Atraso();
        $atraso->fecha_atraso = Carbon::now()->format('Y/m/d');
        $atraso->hora_atraso = $this->horaDeLlegada;
        $atraso->hora_entrada = $this->selectedOptionId[0]->id;
        $atraso->user_id = $this->datos[0]->id;
        $atraso->justifica = $this->justifica;
        $atraso->save();


        /*Se resetea el campo busqueda y se cierra la seccion del estudiante*/
        $this->busqueda="";
        $this->buscar();
        $this->justifica=false;

        /*Se actualiza la hora de entrada con la ultima hora de entrada registrada*/


        $penultimoUso = HorasDeEntrada::where('ultimousosn',1)->get();
        if(!$penultimoUso[0]->id = $this->selectedOptionId[0]){
            $this->selectedOptionId[0]->ultimousosn = 1;
        }







        session()->flash('message', 'Atraso guardado exitosamente.');

    }



}
