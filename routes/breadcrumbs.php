<?php // routes/breadcrumbs.php

use App\Models\Compra;
use App\Models\Producto;
use Diglactic\Breadcrumbs\Breadcrumbs;


use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Inicio', route('home'));
});
Breadcrumbs::for('terms', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Términos y condiciones', route('terms'));
});

Breadcrumbs::for('priv', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Aviso de Privacidad', route('priv'));
});

Breadcrumbs::for('faq', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Preguntas frecuentes', route('faq'));
});
Breadcrumbs::for('mapa', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Mapa del Sitio', route('mapa'));
});
Breadcrumbs::for('contact', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Contacto', route('contact'));
});
Breadcrumbs::for('acerca', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Acerca de Nosotros', route('acerca'));
});

Breadcrumbs::for('produc', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Productos', route('produc'));
});
Breadcrumbs::for('product', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Busqueda', route('product'));
});
Breadcrumbs::for('pedidos', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Mis Pedidos', route('pedidos'));
});
Breadcrumbs::for('ubicaciones', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Mis Ubicaciones', route('ubicaciones'));
});


Breadcrumbs::for('vender', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Vender', route('vender'));
});
Breadcrumbs::for('vendedor', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Vender', route('vendedor'));
});
Breadcrumbs::for('carrito', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Carrito de Compras', route('carrito'));
});

Breadcrumbs::for('comprar', function (BreadcrumbTrail $trail) {
    $trail->parent('carrito');
    $trail->push('Realizar Compra', route('comprar'));
});

Breadcrumbs::for('ventas', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Mis ventas', route('ventas'));
});

Breadcrumbs::for('misproductos', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Mis Productos', route('misproductos'));
});

Breadcrumbs::for('editarproducto.id', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('misproductos');
    $trail->push('Editar Producto', route('editarproducto.id',$id));
});
Breadcrumbs::for('compras.compra', function (BreadcrumbTrail $trail, $compra) {
    $trail->parent('pedidos');
    $compras = Compra::findOrFail($compra);
    $trail->push('Detalle Compra', route('compras.compra',$compra));
});

Breadcrumbs::for('mensaje.i', function (BreadcrumbTrail $trail, $i) {
    $trail->parent('home');

    $trail->push('Mensajes', route('mensaje.i',$i));
});

Breadcrumbs::for('calificar.producto', function (BreadcrumbTrail $trail, $i) {
    $trail->parent('home');

    $trail->push('Mensajes', route('calificar.producto',$i));
});




Breadcrumbs::for('pedir.producto', function (BreadcrumbTrail $trail, $producto) {
    $trail->parent('produc');
    $nombre=Producto::findOrFail($producto);
    $trail->push($nombre->nombre , route('pedir.producto', $producto));
});

Breadcrumbs::for('pasteles', function (BreadcrumbTrail $trail) {
    $trail->parent('produc');
    $trail->push('Pasteles', route('pasteles'));
});
Breadcrumbs::for('gelatinas', function (BreadcrumbTrail $trail) {
    $trail->parent('produc');
    $trail->push('Gelatinas', route('gelatinas'));
});
Breadcrumbs::for('galletas', function (BreadcrumbTrail $trail) {
    $trail->parent('produc');
    $trail->push('Galletas', route('galletas'));
});
