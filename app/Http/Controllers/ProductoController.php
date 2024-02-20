<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Compra;
use App\Models\DetalleCompra;
use App\Models\DetalleVenta;
use App\Models\ImagenProducto;
use App\Models\Pedida;
use App\Models\Producto;
use App\Models\Ubicacion;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    //
    public function editar($id)
{
    $producto = Producto::findOrFail($id);

    // Verificar que el usuario actual sea el dueño del producto
    if (Auth::id() !== $producto->id_usuario) {
        abort(403); // Acceso no autorizado
    }

    return view('user.editpro', compact('producto'));
}
public function actualizarp(Request $request, $id)
{
    $producto = Producto::findOrFail($id);

    // Verificar que el usuario actual sea el dueño del producto
    if (Auth::id() !== $producto->id_usuario) {
        abort(403); // Acceso no autorizado
    }

    $request->validate([
        'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',

            'imagenes.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para imágenes
    ]);

    $producto->update([
        'nombre' => $request->nombre,
        'precio' => $request->precio,
        'oferta' => $request->oferta,
        'descripcion' => $request->descripcion,
    ]);


    if ($request->hasFile('imagenes')) {
        foreach ($request->file('imagenes') as $imagen) {
            // Almacenar la imagen en la carpeta "public/imagenes"
            $rutaImagen = $imagen->store('imagenes', 'public');

            // Crear un nuevo objeto Imagen y asignarle la URL de la imagen
            $nuevaImagen = new ImagenProducto();
            $nuevaImagen->id_producto = $producto->id;
            $nuevaImagen->url =  Storage::url($rutaImagen);

            // Guardar la imagen en la base de datos
            $nuevaImagen->save();
        }
    }



    return redirect()->route('misproductos')->with('success', 'Producto actualizado exitosamente.');
}
    public function buscarPorCiudadOCategoria(Request $request)
{
    $categorias = Categoria::all();
    $categoriaBuscada = $request->categoria;

    // Buscar la categoría por el nombre ingresado en el formulario
    $categoria = Categoria::where('nombre', $categoriaBuscada)->first();
    if (!$categoria) {
        $productos = collect();
        return view('user.productos4', ['productos' => $productos,'categorias' => $categorias]);    }
    $productos = $categoria->productos;


    return view('user.productos4', ['productos' => $productos,'categorias' => $categorias]);
}
    public function producubicacion(Request $request)
    {
        $ciudadSeleccionada = $request->input('ciudad');

        $usuariosConCiudadVenta = Ubicacion::where('tipo', 'venta')
            ->where('ciudad', $ciudadSeleccionada)
            ->pluck('id_usuario');

        $productos = Producto::whereIn('id_usuario', $usuariosConCiudadVenta)->get();

        $ciudades = Ubicacion::where('tipo', 'venta')->pluck('ciudad')->unique();

        return view('user.productos3', [
            'ciudades' => $ciudades,
            'productos' => $productos,
        ]);
    }


    public function vender()
{
    $user = Auth::user();
    $categorias = Categoria::all();
    return view('user.vender', compact('categorias','user'));
}
    public function guardarProducto(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'disponible' => 'required|numeric',
            'metodoentrega' => 'required',
            'metodopago' => 'required',
            'imagenes.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para imágenes
            'categorias' => 'required|array',
        ]);

        // Crear un nuevo objeto Producto con los datos del formulario
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->oferta = $request->oferta;
        $producto->disponible = $request->disponible;
        $producto->vendidos = 0;
        $producto->metodoentrega = $request->metodoentrega;
        $producto->metodopago = $request->metodopago;
        // Agrega más campos según los datos de tu modelo Producto
        $producto->creacion = now(); // Establecer la fecha actual

        // Obtener el ID del usuario logueado y asignarlo al producto
        $producto->id_usuario = auth()->user()->id;

        // Guardar el producto en la base de datos
        $producto->save();

        // Guardar las categorías seleccionadas para el producto
        $categoriasSeleccionadas = $request->input('categorias');
        foreach ($categoriasSeleccionadas as $categoriaId) {
            DB::table('productocategorias')->insert([
                'id_producto' => $producto->id,
                'id_categoria' => $categoriaId,
            ]);
        }

        // Guardar las imágenes relacionadas con el producto
        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $imagen) {
                // Almacenar la imagen en la carpeta "public/imagenes"
                $rutaImagen = $imagen->store('imagenes', 'public');

                // Crear un nuevo objeto Imagen y asignarle la URL de la imagen
                $nuevaImagen = new ImagenProducto();
                $nuevaImagen->id_producto = $producto->id;
                $nuevaImagen->url =  Storage::url($rutaImagen);

                // Guardar la imagen en la base de datos
                $nuevaImagen->save();
            }
        }

        // Redirigir a alguna vista o hacer algo más después de guardar el producto
        return redirect('/')->with('success', 'Producto agregado exitosamente');
    }
    public function buscar(Request $request)
    {
        $busqueda = $request->busqueda;

        $productos = Producto::where('nombre', 'like', '%' . $busqueda . '%')
            ->orWhereHas('categorias', function ($query) use ($busqueda) {
                $query->where('nombre', 'like', '%' . $busqueda . '%');
            })
            ->get();

        return view('user.productos2', ['productos' => $productos]);
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
        $user = Auth::user();
        $ubicaciones = collect();
        if ($user) {
            // Si está logueado, obtenemos sus domicilios
            $ubicaciones = $user->domicilios;
        }
        $productos = Producto::with('imagen')->paginate(30);

        return view('user.productos',['productos'=>$productos,'ubicaciones' => $ubicaciones]);
    }
    public function productos2(Request $request){

        $ciudadUsuario = $request->id_ubicacion;
 $ciudad = Ubicacion::findOrFail($ciudadUsuario);


 $productos = Producto::whereHas('usuario.domicilios', function ($query) use ($ciudad) {
    $query->where('tipo', 'venta')->where('ciudad', $ciudad->ciudad);
})->get();





        return view('user.productos2',['productos'=>$productos]);
    }

    public function existencias(){

        $productos = Producto::all();
        return view('admin.productoa',['productos'=>$productos]);
    }


    public function pedidos() {
        // Obtener el usuario autenticado
        $usuario = Auth::user();

        // Obtener las compras del usuario autenticado con sus detalles de compra
        $compras = Compra::with('detalleCompras.producto')
                         ->where('id_usuario', $usuario->id)
                         ->get();

        // Obtener las ubicaciones del usuario autenticado (puedes modificar esto según tu lógica)
        $ubicaciones = Ubicacion::where('id_usuario', $usuario->id)->get();

        // Pasar los datos a la vista
        return view('user.pedidos', compact('compras', 'ubicaciones'));
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
    public function verCarrito()
{

    $carrito = session()->get('carrito', []);

    return view('user.carrito', compact('carrito'));
}

public function agregar1(Request $request, $id_producto)
{
    $producto = Producto::find($id_producto);

    // Verificar si el producto existe
    if (!$producto) {
        return redirect()->back()->with('error', 'El producto no existe.');
    }
  // Verificar si el usuario autenticado es el creador del producto
  if (Auth::check() && $producto->usuario->id === Auth::user()->id) {
    return redirect()->back()->with('error', 'No puedes agregar tu propio producto al carrito.');
}
    // Obtener el carrito actual del usuario desde la sesión
    $carrito = session()->get('carrito', []);

    // Verificar si el producto ya está en el carrito
    if (isset($carrito[$id_producto])) {
        // Si ya existe, aumentar la cantidad en 1
        $carrito[$id_producto]['cantidad']++;
    } else {
        // Si no existe, agregar el producto al carrito con una cantidad de 1
        $carrito[$id_producto] = [
            'id' => $producto->id,
            'nombre' => $producto->nombre,
            'precio' => $producto->precio,
            'cantidad' => 1,
        ];
    }

    // Actualizar la sesión del usuario con el nuevo carrito
    session()->put('carrito', $carrito);

    return redirect('/carrito')->with('success', 'Producto agregado al carrito.');
}
public function agregar(Request $request, $id_producto)
{
    $producto = Producto::find($id_producto);

    // Verificar si el producto existe
    if (!$producto) {
        return redirect()->back()->with('error', 'El producto no existe.');
    }
  // Verificar si el usuario autenticado es el creador del producto
  if (Auth::check() && $producto->usuario->id === Auth::user()->id) {
    return redirect()->back()->with('error', 'No puedes agregar tu propio producto al carrito.');
}
    // Obtener el carrito actual del usuario desde la sesión
    $carrito = session()->get('carrito', []);

    // Verificar si el producto ya está en el carrito
    if (isset($carrito[$id_producto])) {
        // Si ya existe, aumentar la cantidad en 1
        $carrito[$id_producto]['cantidad']++;
    } else {
        // Si no existe, agregar el producto al carrito con una cantidad de 1
        $carrito[$id_producto] = [
            'id' => $producto->id,
            'nombre' => $producto->nombre,
            'precio' => $producto->precio,
            'cantidad' => 1,
        ];
    }

    // Actualizar la sesión del usuario con el nuevo carrito
    session()->put('carrito', $carrito);

    return redirect()->back()->with('success', 'Producto agregado al carrito.');
}
public function quitar(Request $request, $id_producto)
{
    // Verificar si el producto existe
    $producto = Producto::find($id_producto);
    if (!$producto) {
        return redirect()->back()->with('error', 'El producto no existe.');
    }

    // Obtener el carrito actual del usuario desde la sesión
    $carrito = session()->get('carrito', []);

    // Verificar si el producto está en el carrito
    if (isset($carrito[$id_producto])) {
        // Si la cantidad es mayor a 1, disminuir en 1
        if ($carrito[$id_producto]['cantidad'] > 1) {
            $carrito[$id_producto]['cantidad']--;
        } else {
            // Si la cantidad es 1, eliminar el producto del carrito
            unset($carrito[$id_producto]);
        }

        // Actualizar la sesión del usuario con el carrito actualizado
        session()->put('carrito', $carrito);

        return redirect()->back()->with('success', 'Cantidad disminuida en el carrito.');
    }

    return redirect()->back()->with('error', 'El producto no está en el carrito.');
}

public function crearCompra()
{

    // Obtener el carrito actual del usuario desde la sesión
    $carrito = session()->get('carrito', []);

    // Verificar si el carrito está vacío
    if (empty($carrito)) {
        return redirect()->back()->with('error', 'El carrito está vacío.');
    }

    // Agrupar los productos según los métodos de entrega y pago disponibles
    $compras = [];
    foreach ($carrito as $productoId => $productoInfo) {
        $producto = Producto::find($productoId);
        $metodoEntrega = $producto->metodoentrega;
        $metodoPago = $producto->metodopago;

        $key = "{$metodoEntrega}_{$metodoPago}";
        if (!isset($compras[$key])) {
            $compras[$key] = [
                'metodoentrega' => $metodoEntrega,
                'metodopago' => $metodoPago,
                'productos' => [],
            ];
        }

        $subtotal = $productoInfo['cantidad'] * $producto->precio;
        $compras[$key]['productos'][] = [
            'id' => $producto->id,
            'nombre' => $producto->nombre,
            'precio' => $producto->precio,
            'cantidad' => $productoInfo['cantidad'],
            'subtotal' => $subtotal,
        ];
    }
    $user = auth()->user();
    $ubicaciones = $user->domicilios;
    return view('user.comprar', compact('compras','ubicaciones'));
}
public function guardarCompra(Request $request)
    {
      //  dd($request->input('ubicacion_id'));
        $carrito = session()->get('carrito', []);



        // Agrupar los productos según los métodos de entrega y pago disponibles
        $compras = [];
        foreach ($carrito as $productoId => $productoInfo) {
            $producto = Producto::find($productoId);
            $metodoEntrega = $producto->metodoentrega;
            $metodoPago = $producto->metodopago;

            $key = "{$metodoEntrega}_{$metodoPago}";
            if (!isset($compras[$key])) {
                $compras[$key] = [
                    'metodoentrega' => $metodoEntrega,
                    'metodopago' => $metodoPago,
                    'productos' => [],
                    'total' => 0,
                ];
            }

            $subtotal = $productoInfo['cantidad'] * $producto->precio;
            $compras[$key]['productos'][] = [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'cantidad' => $productoInfo['cantidad'],
                'subtotal' => $subtotal,
            ];
            $compras[$key]['total'] += $subtotal;
        }
      // Procesar cada compra por separado y guardarla en la base de datos
    foreach ($compras as $compraData) {
        $compra = new Compra();
        $compra->id_usuario = auth()->user()->id;
        $compra->fechacompra = now();

        $compra->total = $compraData['total'];
        $compra->metodoentrega = $compraData['metodoentrega'];
        $compra->metodopago = $compraData['metodopago'];
        $compra->estado = ($compraData['metodopago'] == 'Tarjeta') ? 'Pago pendiente' : 'Pendiente';
        $compra->save();
        $ubicacionId = null;

        if ($compraData['metodoentrega'] == 'A domicilio' && isset($request->ubicacion_id)) {
            $ubicacionId = $request->ubicacion_id;
        }
           // Obtener el id de ubicación del vendedor si el método de entrega es "A punto"
    $ubicacionVendedorId = null;
    if ($compraData['metodoentrega'] == 'En Punto') {
        // Buscamos el producto vendido en la base de datos para obtener su id_usuario
        $productoVendido = Producto::find($compraData['productos'][0]['id']);
        if ($productoVendido) {
            $idUsuarioVendedor = $productoVendido->id_usuario;

            // Buscamos la ubicación del vendedor con tipo "venta"
            $ubicacionVendedor = Ubicacion::where('id_usuario', $idUsuarioVendedor)->where('tipo', 'venta')->first();

            if ($ubicacionVendedor) {
                $ubicacionVendedorId = $ubicacionVendedor->id;
            }
        }
    }


        // Crear los detalles de compra asociados a esta compra
        foreach ($compraData['productos'] as $productoData) {
            $detalleCompra = new DetalleCompra();
            $detalleCompra->id_compra = $compra->id;
            $detalleCompra->id_producto = $productoData['id'];
            $detalleCompra->cantidad = $productoData['cantidad'];
            $detalleCompra->total = $productoData['subtotal'];
            if ( $ubicacionVendedorId !== null) {
                $detalleCompra->id_ubicacion = $ubicacionVendedorId;
            }
            $detalleCompra->save();
        }

        $venta = new Venta();
        $venta->id_usuario = auth()->user()->id;
        $venta->fechaventa = now();
        $venta->total = $compraData['total'];
        $venta->estado = ($compraData['metodopago'] == 'Tarjeta') ? 'Pago pendiente' : 'Pendiente';
        $venta->save();

        foreach ($compraData['productos'] as $productoData) {
            $producto = Producto::find($productoData['id']);
            $cantidadVendida = $productoData['cantidad'];
            $producto->disponible -= $cantidadVendida;
            $producto->vendidos = $cantidadVendida;
            $producto->save();

            // Crear un detalle de venta asociado a esta venta y producto vendido
            $detalleVenta = new DetalleVenta();
            $detalleVenta->id_venta = $venta->id;
            $detalleVenta->id_producto = $productoData['id'];
            $detalleVenta->cantidad = $cantidadVendida;
            $detalleVenta->total = $productoData['subtotal'];
            if ($ubicacionId !== null) {
                $detalleVenta->id_ubicacion = $ubicacionId;
            }
            $detalleVenta->save();
        }
    }

    // Eliminar las compras del carrito o marcarlas como confirmada
    session()->forget('carrito');

    // Redireccionar a una página de éxito o mostrar un mensaje de confirmación
    return redirect('/compras');

    }

    public function verDetalles($id)
{
    $compra = Compra::find($id);

    if (!$compra) {
        return redirect('/compras')->with('error', 'La compra no existe.');
    }

    // Obtener detalles de compra asociados a esta compra
    $detallesCompra = DetalleCompra::where('id_compra', $compra->id)->get();

    return view('user.compra', compact('compra', 'detallesCompra'));
}

public function actualizarCompra($id)
{
    $compra = Compra::find($id);

    if (!$compra) {
        return redirect()->back()->with('error', 'La compra no existe.');
    }

    // Verificamos si la compra ya está pagada
    if ($compra->estado == 'Pagado') {
        return redirect()->back()->with('error', 'La compra ya ha sido pagada.');
    }

    // Realizar la actualización del estado a "Pagado"
    $compra->estado = 'Pagado';
    $compra->save();

    return redirect('/compras')->with('success', 'La compra ha sido pagada exitosamente.');
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


}



