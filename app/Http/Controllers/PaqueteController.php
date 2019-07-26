<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paquete;
use Yajra\Datatables\Datatables;
class PaqueteController extends Controller
{
    public function index(){
       $paquete = Paquete::all();
      return Datatables::of($paquete)
            ->addColumn('btn', function ($paquete) {
                        return '
                        <a class="btn btn-primary btn-sm"  href="/inicio#/paquete-detalle/' . $paquete->id . '">
                        <i class="fa fa-eye"></i> Ver
                        </a>
                       ';
                    })
             ->rawColumns(['btn'])
             ->make(true);
    }

    public function crear(Request $request){
        $paquete = new Paquete();
        $paquete->estado = 'EN TRANCITO';
        $paquete->nombre = $request->nombre;
        $paquete->telefono = $request->tel;
        $paquete->telefono_alternativo = $request->tel_alt;
        $paquete->ciudad = $request->ciudad;
        $paquete->direccion = $request->direccion;
        $paquete->barrio = $request->barrio;
        $paquete->producto = $request->producto;
        $paquete->observacion = $request->observacion;
        $paquete->cantidad = $request->cantidad;
        $paquete->valor = $request->valor;
        $paquete->total = $request->valor * $request->cantidad;
        $paquete->save();

        return 200;

    }
    public function detalle($id){

        return Paquete::find($id); 
    }
}
