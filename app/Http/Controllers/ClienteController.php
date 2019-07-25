<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Cliente;
use App\User;


class ClienteController extends Controller
{
    public function index(){
        $clientes = Cliente::all();
       return Datatables::of($clientes)
             ->addColumn('btn', function ($clientes) {
                         return '
                         <a class="btn btn-primary btn-sm"  href="/inicio#/paquete-detalle/' . $clientes->id . '">
                         <i class="fa fa-eye"></i> Ver
                         </a>
                        ';
                     })
              ->rawColumns(['btn'])
              ->make(true);
     }
    public function store(Request $request){
        $user = new User();
        $user->name = $request->nombre_contacto;
        $user->email = $request->usuario;
        $user->tel = $request->tel_contacto;
        $user->password = bcrypt($request->pass);
        $user->rol = 'Cliente';
        $user->save();

        $cliente = new Cliente();
        $cliente->tipo = $request->tipo; 
        $cliente->razon_social = $request->razonSocial; 
        $cliente->razon_social = $request->razonSocial; 
        $cliente->cedula_nit = $request->cedula_nit; 
        $cliente->ciudad = $request->ciudad; 
        $cliente->direccion = $request->direccion; 
        $cliente->correo = $request->correo; 
        $cliente->actividad = $request->actividad; 
        $cliente->nombre_contacto = $request->nombre_contacto; 
        $cliente->tel_contacto = $request->tel_contacto; 
        $cliente->correo_contacto = $request->correo_contacto; 
        $cliente->user_id = $user->id;

        $cliente->save();


        return 200;

    }
}
