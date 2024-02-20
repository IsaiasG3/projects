<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\Telefonia;
use Illuminate\Http\Request;

class EditarController extends Controller
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
        $dispositivo = Telefonia::find($id);
        return view('telefonias.editar',['dispositivo'=>$dispositivo,'colaboradores'=>$colaboradores]);

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
            'modelo'=>'required|max:30',
            'marca'=>'required|max:30',
            'serie'=>'required|max:30',
            'imci'=>'required',
            'sim'=>'required|max:40',
            'tel_cerebrit0'=>'required|max:10|min:10'
        ]);

        $telefonia = Telefonia::find($id); //Encontrar datos
        $telefonia-> modelo=$request->modelo;  //pasar parametros
       $telefonia-> marca=$request->marca;
       $telefonia-> imci=$request->imci;
       $telefonia-> serie=$request->serie;
       $telefonia-> sim=$request->sim;
       $telefonia-> tel_cerebrit0=$request->tel_cerebrit0;
       $telefonia-> id_colaborador=$request->id_colaborador;
       $telefonia-> save(); //guardar
       return redirect('/telefonias2');
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
