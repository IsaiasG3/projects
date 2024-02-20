<?php

namespace App\Http\Controllers;

use App\Imports\BajasImport;
use App\Imports\ColaboradorImport;
use App\Models\Cliente;
use App\Models\Colaborador;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ColaboradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $busqueda = $request->busqueda;
        $colaborador=Colaborador::all();
        $colaborador = Colaborador::where('nombres','like','%'.$busqueda.'%')->orWhere('apellidos','like','%'.$busqueda.'%')
        ->get();
        return view('colaboradores.colaboradores',['colaboradores'=>$colaborador]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clientes=Cliente::all();
        return view('colaboradores.nuevocolaborador',['clientes'=>$clientes]);
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
        $request->validate([
            'nombres'=>'required|max:30',
            'apellidos'=>'required|max:30',
            'numero'=>'required|max:10|min:10',
            'id_cliente'=>'required'
        ]);
        $colaborador= new Colaborador();
        $colaborador->create($request->all());
        return redirect('/colaboradores2');
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
        $clientes=Cliente::all();
        $colaborador = Colaborador::find($id);
        $colaborador->estado=$request->estado;
        $colaborador-> save();
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
    public function colaborador(){

        $colaborador=Colaborador::where("estado","=","Activo")->get();;
        return view('colaboradores.colaboradores',['colaboradores'=>$colaborador]);

    }
    public function bajas(Request $request){
        $colaborador=Colaborador::where("estado","=","Baja")->get();
        $busqueda = $request->busqueda;
        $colaborador=Colaborador::all();
        $colaborador = Colaborador::where('nombres','like','%'.$busqueda.'%')->orWhere('apellidos','like','%'.$busqueda.'%')
        ->get();
        return view('colaboradores.bajas',['colaboradores'=>$colaborador]);

    }

    public function importar3(Request $request){
        $file = $request->file('import_file');
        Excel::import(new ColaboradorImport, $file);
        return redirect('/colaboradores2');
    }

    public function importar4(Request $request){
        $file = $request->file('import_file');
        Excel::import(new BajasImport, $file);
        return redirect('/colaboradores3');
    }
}
