<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function validar(Request $request){
        if (Auth::attempt(['email'=>$request['correo'], 'password'=>$request['pass']])) {
        return redirect('inicio');
      }
      return back();
    }
}
