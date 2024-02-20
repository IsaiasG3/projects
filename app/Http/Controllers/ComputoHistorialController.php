<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\Computo;
use App\Models\ComputoHistorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComputoHistorialController extends Controller
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
    public function create(Request $request)
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
        //validate
        $request->validate([
            'fecha_entrega'=>'date',
            'foto_sal1'=>'required',
            'foto_sal2'=>'required',
            'foto_sal3'=>'required',
            'foto_sal4'=>'required',

        ]);

        $imagen1= $request->file('foto_sal1')->store('public');
        $imagen2 = $request->file('foto_sal2')->store('public');
        $imagen3 = $request->file('foto_sal3')->store('public');
        $imagen4 = $request->file('foto_sal4')->store('public');

        $url1 = Storage::url( $imagen1);
      $url2 = Storage::url( $imagen2);
        $url3 = Storage::url( $imagen3);
        $url4 = Storage::url( $imagen4);

        $historial=new ComputoHistorial();
        $historial->create([
            'fecha_entrega' =>$request->fecha_entrega,
            'estado' =>$request->estado,
            'fallas' =>$request->fallas,
            'fecha_dev' =>$request->fecha_dev,
            'foto_sal1' =>'/storage/app/'.$request->file('foto_sal1')->store(''),
            'foto_sal2' =>'/storage/app/'.$request->file('foto_sal2')->store(''),
            'foto_sal3' =>'/storage/app/'.$request->file('foto_sal3')->store(''),
            'foto_sal4' =>'/storage/app/'.$request->file('foto_sal4')->store(''),
            'archivo'=>$request->archivo,
            'foto_dev1' =>$request->foto_dev1,
            'foto_dev2' =>$request->foto_dev2,
            'foto_dev3' =>$request->foto_dev3,
            'foto_dev4' =>$request->foto_dev4,
            'id_colaborador' =>$request->id_colaborador,
            'id_dispositivo' =>$request->id_dispositivo,
        ]);
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
        $dispositivo=Computo::find($id);

        $historial=ComputoHistorial::where("id_dispositivo","=",$id)->where('fecha_dev','like','0001-01-01')->first();
         //dd($historial);
        return view('historialescom.entregar',['historial'=>$historial,'dispositivo'=>$dispositivo]);
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

            'foto_dev1'=>'required|image',
            'foto_dev2'=>'required|image',
            'foto_dev3'=>'required|image',
            'foto_dev4'=>'required|image',
            'estado'=>'required',
            'fallas'=>'required',
            'fecha_dev'=>'date|required'
        ]);
        $historial = ComputoHistorial::find($id);

        $imagen1= $request->file('foto_dev1')->store('public');
        $imagen2 = $request->file('foto_dev2')->store('public');
        $imagen3 = $request->file('foto_dev3')->store('public');
        $imagen4 = $request->file('foto_dev4')->store('public');
       $url1 = Storage::url( $imagen1);
        $url2 = Storage::url( $imagen2);
        $url3 = Storage::url( $imagen3);
        $url4 = Storage::url( $imagen4);



        $historial->fecha_dev=$request->fecha_dev;
        $historial->estado=$request->estado;
        $historial->fallas=$request->fallas;
        $historial->foto_dev1='/storage/app/'.$request->file('foto_dev1')->store('');
        $historial->foto_dev2='/storage/app/'.$request->file('foto_dev2')->store('');
        $historial->foto_dev3='/storage/app/'.$request->file('foto_dev3')->store('');
        $historial->foto_dev4='/storage/app/'.$request->file('foto_dev4')->store('');
        $historial->save();
        $id_d=$historial->id_dispositivo;
        $colaboradores=Colaborador::all();
        $dispositivo= Computo::find($id_d);
        return view('computos.asignar',['dispositivo'=>$dispositivo,'colaboradores'=>$colaboradores]);
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
