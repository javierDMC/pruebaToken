<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $usuario = Usuario::where('login', $request->login)->first();
        if (
            !$usuario ||
            !Hash::check($request->password, $usuario->password)
        ) {
            return response()->json(
                ['error' => 'Credenciales no válidas'],
                401
            );
        } else {
            $usuario->api_token = Str::random(60);
            $usuario->save();
            return response()->json(['token' => $usuario->api_token]);
        }
    }
}
