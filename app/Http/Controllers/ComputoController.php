<?php

namespace App\Http\Controllers;

use App\Exports\ComputosExport;
use App\Imports\ComputosImport;
use App\Models\Colaborador;
use App\Models\Computo;
use App\Models\ComputoHistorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ComputoController extends Controller
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
        $computo = Colaborador::join('computos','colaboradores.id','=','computos.id_colaborador')
        ->select('*')
        ->where('colaboradores.nombres', 'like','%'.$busqueda.'%')
        ->orWhere('folio','like','%'.$busqueda.'%')
        ->orWhere('serie','like','%'.$busqueda.'%')
        ->orWhere('colaboradores.apellidos','like','%'.$busqueda.'%')
        ->get();
       // dd($computo);
        /*$computo = Computo::where('serie','like','%'.$busqueda.'%')->orWhere('folio','like','%'.$busqueda.'%')->orWhere('id_colaborador','like','%'.$busqueda.'%')
        ->get();*/
        //dd($computo);
        $historiales=ComputoHistorial::where("fecha_dev","=","Sin devolver")->get();

            return view('computos.computos',['computo'=>$computo,'historiales'=>$historiales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $colaboradores=Colaborador::all();
        return view('computos.nuevocomputo',['colaboradores'=>$colaboradores]);
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
            'tipo'=>'required|max:30',
            'serie'=>'required|max:30',
            'folio'=>'required',
            'cargador'=>'required|max:40',
            'descripcion'=>'required'
        ]);
        $dispositivo= new Computo();
        $dispositivo->create($request->all());
        return redirect('/computos2');
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
        $dispositivo=Computo::find($id);

        $historiales=ComputoHistorial::where("id_dispositivo","=",$id)->where('id_colaborador',">",1)->get();
        ComputoHistorial::where('id_colaborador',"=",1)->delete();
        return view('historialescom.historial',['dispositivo'=>$dispositivo,'historiales'=>$historiales]);
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
        return view('computos.asignar',['dispositivo'=>$dispositivo,'colaboradores'=>$colaboradores]);
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
            'id_colaborador'=>'required'
        ]);
        $colaboradores=Colaborador::all();
        $dispositivo = Computo::find($id);
        $dispositivo->id_colaborador=$request->id_colaborador;
        $dispositivo-> save();
        if($request->id_colaborador == 69)
        return redirect('/computos2');
        if($request->id_colaborador>1)
        return view('historialescom.crear',['dispositivo'=>$dispositivo,'colaboradores'=>$colaboradores]);

        else
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
    public function computo(){
        $computo=Colaborador::join('computos','colaboradores.id','=','computos.id_colaborador')
        ->select('*')
        ->get();
        $historiales=ComputoHistorial::where("fecha_dev","=","Sin devolver")->get();

            return view('computos.computos',['computo'=>$computo,'historiales'=>$historiales]);

    }
    public function importar(Request $request){
        $file = $request->file('import_file');
        Excel::import(new ComputosImport, $file);
        return redirect('/computos2');
    }

    public function exportar(Request $request){
        ini_set('memory_limit','-1');
        set_time_limit(10000);
        return Excel::download(new ComputosExport, 'computos.xlsx');
    }
}
