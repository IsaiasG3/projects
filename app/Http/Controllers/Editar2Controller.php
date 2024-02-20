<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\Computo;
use Illuminate\Http\Request;

class Editar2Controller extends Controller
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
        $colaboradores=Colaborador::all();
        $dispositivo = Computo::find($id);
        return view('computos.editar',['dispositivo'=>$dispositivo,'colaboradores'=>$colaboradores]);
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
            'tipo'=>'required|max:30',
            'serie'=>'required|max:30',
            'folio'=>'required',
            'cargador'=>'required|max:40',
            'descripcion'=>'required'
        ]);
        $computo = Computo::find($id); //Encontrar datos
        $computo-> tipo=$request->tipo;  //pasar parametros
       $computo-> folio=$request->folio;
       $computo-> cargador=$request->cargador;
       $computo-> serie=$request->serie;
       $computo-> descripcion=$request->descripcion;
       $computo-> id_colaborador=$request->id_colaborador;
       $computo-> save(); //guardar
       return redirect('/computos2');
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
