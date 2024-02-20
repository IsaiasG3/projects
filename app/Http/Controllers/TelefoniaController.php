<?php

namespace App\Http\Controllers;

use App\Exports\TelefoniasExport;
use App\Imports\TelefoniasImport;
use App\Models\Colaborador;
use App\Models\Telefonia;
use App\Models\TelefoniaHistorial;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TelefoniaController extends Controller
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
        $telefonia=Colaborador::join('telefonias','colaboradores.id','=','telefonias.id_colaborador')
        ->select('*')
        ->where('colaboradores.nombres', 'like','%'.$busqueda.'%')
        ->orWhere('tel_cerebrit0','like','%'.$busqueda.'%')
        ->orWhere('serie','like','%'.$busqueda.'%')
        ->orWhere('colaboradores.apellidos','like','%'.$busqueda.'%')
        ->get();
        return view('telefonias.telefonias',['telefonia'=>$telefonia]);
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
        return view('telefonias.nuevotelefonia',['colaboradores'=>$colaboradores]);
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
            'modelo'=>'required|max:30',
            'marca'=>'required|max:30',
            'serie'=>'required|max:30',
            'imci'=>'required',
            'sim'=>'required|max:40',
            'tel_cerebrit0'=>'required|max:10|min:10'
        ]);
        $dispositivo= new Telefonia();
        $dispositivo->create($request->all());
        return redirect('/telefonias2');
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
        $dispositivo=Telefonia::find($id);
        $historiales=TelefoniaHistorial::where("id_dispositivo","=",$id)->where('id_colaborador',">",1)->get();
        TelefoniaHistorial::where('id_colaborador',"=",1)->delete();
        return view('historialestel.historial',['dispositivo'=>$dispositivo,'historiales'=>$historiales]);
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
        return view('telefonias.asignar',['dispositivo'=>$dispositivo,'colaboradores'=>$colaboradores]);

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
        $dispositivo = Telefonia::find($id);
        $dispositivo->id_colaborador=$request->id_colaborador;
        $dispositivo-> save();
        if($request->id_colaborador == 69)
        return redirect('/telefonias2');
        if($request->id_colaborador>1)
        return view('historialestel.crear',['dispositivo'=>$dispositivo,'colaboradores'=>$colaboradores]);
        else
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
    public function telefonia(){
        $telefonia=Colaborador::join('telefonias','colaboradores.id','=','telefonias.id_colaborador')
        ->select('*')
        ->get();
        $historiales=TelefoniaHistorial::where("fecha_dev","=","Sin devolver")->get();

            return view('telefonias.telefonias',['telefonia'=>$telefonia,'historiales'=>$historiales]);

    }
    public function importar2(Request $request){
        $file = $request->file('import_file2');
        Excel::import(new TelefoniasImport, $file);
        return redirect('/telefonias2');
    }

    public function exportar2(Request $request){
        ini_set('memory_limit','-1');
        set_time_limit(10000);
        return Excel::download(new TelefoniasExport, 'telefonias.xlsx');

    }


}
