<?php

namespace App\Http\Controllers;

use App\Models\Computo;
use App\Models\ComputoHistorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HistorialEditarController extends Controller
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

        $historial=ComputoHistorial::find($id);
        return view('historialescom.editarh',['historial'=>$historial]);
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

           'archivo'=>'required'
        ]);
        $historial = ComputoHistorial::find($id);
        $archivo = $request->file('archivo')->store('public');
        $url5 = Storage::url( $archivo);
        $historial->archivo='/storage/app/'.$request->file('archivo')->store('');
        $historial->save();
        $id_d=$historial->id_dispositivo;
        $dispositivo= Computo::find($id_d);

        $historiales=ComputoHistorial::where("id_dispositivo","=",$id_d)->where('id_colaborador',">",1)->get();
        return view('historialescom.historial',['dispositivo'=>$dispositivo,'historiales'=>$historiales]);
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
