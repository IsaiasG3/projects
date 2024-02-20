<?php

namespace App\Http\Controllers;

use App\Models\Pedida;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    //

    public function buscar(Request $request){
    //  dd($request->busqueda);
        $busqueda = $request->busqueda;
        $productos= Producto::where('nombre','like','%'.$busqueda.'%')->orWhere('sabor','like','%'.$busqueda.'%')
        ->orWhere('categoria','%'.$busqueda.'%')
        ->get();
        return view('user.productos',['productos'=>$productos]);

    }
    public function pasteles(){
            $pasteles= Producto::where('categoria','like','%'.'pastel'.'%')
            ->get();
            return view('user.productos',['productos'=>$pasteles]);

        }
        public function galletas(){
            $pasteles= Producto::where('categoria','like','%'.'galleta'.'%')
            ->get();
            return view('user.productos',['productos'=>$pasteles]);

        }
        public function gelatinas(){
            $pasteles= Producto::where('categoria','like','%'.'gelatina'.'%')
            ->get();
            return view('user.productos',['productos'=>$pasteles]);

        }
    public function productos(){

        $productos = Producto::all();
        return view('user.productos',['productos'=>$productos]);
    }

    public function existencias(){

        $productos = Producto::all();
        return view('admin.productoa',['productos'=>$productos]);
    }


    public function pedidos() {
        $productos = Pedida::where('id_user', auth()->user()->id)->get();
        return view('user.pedidos',['productos'=>$productos]);
    }

    public function pedir($id){
        if (Auth::check()) {
            if (auth()->user()->role == "admin") {
                return view('admin.index');
            }
            $producto = Producto::findOrFail($id);
            return view('user.pedir', ['producto' => $producto]);
        }

    }
    public function pedido(Request $request) {
        $validatedData = $request->validate([
            'entrega' => 'required|date|after:'.now()->addDays(3)->format('Y-m-d'),
            'tamaño' => 'required|string|max:255',
            'sabor' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'escrito' => 'nullable|string|max:255',
            'especial' => 'nullable|string|max:1000',
        ]);

        $pedido = new Pedida([
            'id_user' => auth()->user()->id,
            'id_producto' => $request->input('id_producto'),
            'estado' => 'pendiente',
            'entrega' => $validatedData['entrega'],
            'tamaño' => $validatedData['tamaño'],
            'sabor' => $validatedData['sabor'],
            'color' => $validatedData['color'],
            'escrito' => $validatedData['escrito'],
            'especial' => $validatedData['especial']
        ]);

        $pedido->save();

        return redirect('/mispedidos')
            ->with('success', 'Pedido creado exitosamente.');
    }


    public function nuevo(){
        return view('admin.nuevo');
    }
    public function crear(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'nombre' => 'required|string',
        'precio' => 'required|integer',
        'tamaño' => 'required|string',
        'sabor' => 'required|string',
        'categoria' => 'required|string',
        'color' => 'required|string',
        'imagen' => 'nullable|image',
    ]);

    // Crear un nuevo objeto Producto con los datos del formulario
    $producto = new Producto([
        'nombre' => $request->input('nombre'),
        'precio' => $request->input('precio'),
        'tamaño' => $request->input('tamaño'),
        'sabor' => $request->input('sabor'),
        'categoria' => $request->input('categoria'),
        'color' => $request->input('color'),
    ]);

    // Si se ha subido una imagen, guardarla y guardar la ruta en la base de datos
    if ($request->has('imagen')) {
        $imagen = $request->file('imagen');
        $rutaImagen = $imagen->store('public/productos');
        $producto->imagen = Storage::url($rutaImagen);
    }

    // Guardar el objeto Producto en la base de datos
    $producto->save();

    // Redirigir a la página de detalles del producto recién creado
    return redirect('/nuevoproducto');
}

public function grafica(){
    if (Auth::check()) {
        if (auth()->user()->role == "admin") {
           // Realizamos la consulta a la base de datos
    $datos = DB::table('productos')
    ->select(DB::raw('categoria, count(*) as cantidad'))
    ->groupBy('categoria')
    ->get();

// Creamos el array de datos para la gráfica
$graficaDatos = [];
$graficaDatos[] = ['Categoría', 'Cantidad'];
foreach ($datos as $dato) {
$graficaDatos[] = [$dato->categoria, $dato->cantidad];
}

// Enviamos los datos a la vista
return view('admin.grafica', compact('graficaDatos'));
        }
    }
    $productos=Producto::all();

    return view('welcome',['productos'=>$productos]);
}
    public function realizados(){
        if (Auth::check()) {
            if (auth()->user()->role == "admin") {
                $pedidos = Pedida::where('estado', 'pendiente')->get();
        return view('admin.pedidos',['pedidos'=>$pedidos]);
    }   $productos=Producto::all();

    return view('welcome',['productos'=>$productos]);}
    }

    public function entregados(){
        if (Auth::check()) {
            if (auth()->user()->role == "admin") {
         $pedidos = Pedida::where('estado', 'entregado')->get();
        return view('admin.entregados',['pedidos'=>$pedidos]);
    }   $productos=Producto::all();

    return view('welcome',['productos'=>$productos]);}
    }

    public function usuarios(){
        if (Auth::check()) {
            if (auth()->user()->role == "admin") {
        $usuarios=User::all();
        return view('admin.usuarios',['usuarios'=>$usuarios]);
    }   $productos=Producto::all();

    return view('welcome',['productos'=>$productos]);}
    }
    public function actualizar(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required|string',
        'precio' => 'required|integer',
        'tamaño' => 'required|string',
        'sabor' => 'required|string',
        'categoria' => 'required|string',
        'color' => 'required|string',
    ]);

    $producto = Producto::find($id);
    $producto->nombre = $request->nombre;
    $producto->precio = $request->precio;
    $producto->tamaño = $request->tamaño;
    $producto->sabor = $request->sabor;
    $producto->color = $request->color;
    $producto->categoria = $request->categoria;
    $producto->save();
    return redirect('/existencias')->with('Producto actualizado exitosamente.');
}
public function entregar(Request $request, $pedido)
{
    $pedido = Pedida::find($pedido);
    $pedido->estado = 'entregado';
    $pedido->save();

    return redirect('/entregados');
}

}



