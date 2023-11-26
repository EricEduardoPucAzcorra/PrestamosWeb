<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserPermisoController extends Controller
{
    //

    public function getUserPermisos(){
        $users_permissions = User::with('permisos')->get();

        return $users_permissions;

    }

}
