<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Exception;
class LoginController extends Controller
{
    //use AuthenticatesUsers;

    public function vistalogin(){
        return view('auth.login');
    }

    public function login(Request $request){
        //validar con if
        $this->validarlogin($request);

        if(Auth::attempt(['usuario' => $request->usuario, 'password' => $request->password])){

            return redirect()->route('dashboard');

        }
        //regresar atras, reorna error, y permanece imput llenos
        return back()->withErrors(['usuario' => trans('auth.failed')])->withInput(request(['usuario']));
    }
    //metodo de validacion
    protected function validarlogin(Request $request){
        //valido
        $this->validate($request, [
            'usuario' => 'required|string',
            'password'=> 'required|string'
        ]);
    }

    //cerrar session

    public function salir(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/login');
    }

}
