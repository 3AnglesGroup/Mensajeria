<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use Yajra\Datatables\Datatables;

class ProductoController extends Controller
{
    public function index(){
        $productos = Producto::all();
       return Datatables::of($productos)
             ->addColumn('btn', function ($productos) {
                         return '
                         <a class="btn btn-primary btn-sm"  href="#' . $productos->id . '">
                         <i class="fa fa-eye"></i> Ver
                         </a>
                        ';
                     })
              ->addColumn('propietario',function($productos){
                  return $productos->cliente->razon_social;
              })      
              ->rawColumns(['btn'])
              ->make(true);
     }
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

    public function productosBodega($bodega){
        return Producto::where('bodega',$bodega)->get();

    }
}
