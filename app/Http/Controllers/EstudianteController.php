<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\NormalizarTextoController;
use Illuminate\Routing\Route;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //Normalizar texto antes de guardarlo en la base de datos.

      /*
        $cadena="hólaMúnDo";
        $cadenaNueva=app(NormalizarTextoController::class)->noTildes($cadena);
        dd($cadenaNueva);
      */

        $cambio = User::all();
        foreach ($cambio as $c)
        {
            $c->nombrecompleto = app(NormalizarTextoController::class)->noTildes($c->paterno.' '.$c->materno.' '.$c->name); ;
            $c->save();
        }


        $estudiantes = User::where('tipouser',3)->get();
//        Coleccion vacia
//         $estudiantes=collect();
        return view('estudiantes.index',compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
