<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Colaborador;
use Illuminate\Http\Request;

class Editar3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $clientes=Cliente::all();
        $colaborador = Colaborador::find($id);
        return view('colaboradores.editar',['clientes'=>$clientes,'colaborador'=>$colaborador]);
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
        $request->validate([
            'nombres'=>'required|max:30',
            'apellidos'=>'required|max:30',
            'numero'=>'required|max:10|min:10',
            'id_cliente'=>'required'
        ]); 
        $colaborador = Colaborador::find($id); //Encontrar datos
        $colaborador-> nombres=$request->nombres;  //pasar parametros
        $colaborador-> apellidos=$request->apellidos;
        $colaborador-> numero=$request->numero;
$colaborador-> estado=$request->estado;
        $colaborador-> id_cliente=$request->id_cliente;
       $colaborador-> save(); //guardar
       return redirect('/colaboradores2');
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
