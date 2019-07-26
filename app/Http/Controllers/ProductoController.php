<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ProductoController extends Controller
{
    public function store(Request $request){
        $producto = new Producto();
        $producto->tipo = $request->tipo;
        $producto->nombre = $request->nombre;
        $producto->bodega = $request->bodega;
        $producto->cantidad = $request->cantidad;
        $producto->detalle = $request->detalle;
        $producto->ficha = $request->ficha;
        $producto->cliente_id = $request->propietario;
        $producto->save();

        return 200;
    }
}
