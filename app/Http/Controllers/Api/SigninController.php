<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;
use App\User;

class SigninController extends Controller
{
    /**
     * Logon
     *
     * @param string $email email do usuário (via request)
     * @param string $password senha do usuário (via request)
     */
    public function logon()
    {
        $user = $this->checkAccess();

        if (empty($user)) {
            return response()->json(['message' => 'Acesso nao autorizado'], 401);
        }

        return response()->json(['user' => $user, 'message' => 'Acesso autorizado'], 200);
              
    }

    /**
     * Rest apis são stateless
     * então nosso "logout" consiste na troca do api_token
     * do usuário. Novo acesso requer o processo
     * de logon para obter o novo token
     *
     * @param string $email email do usuário (via request)
     * @param string $password senha do usuário (via request)
     *
     */
    public function logout()
    {
        $user = $this->checkAccess();

        if (empty($user)) {
            return response()->json(['message' => 'Acesso nao autorizado'], 401);
        }        

        // Update token user
        $up_user = User::where('email', $user['email'])->first();
        $up_user->api_token = Str::random(60);
        $up_user->save();

        return response()->json(['message' => 'Logout realizado'], 200);
        
    }

    public function checkAccess()
    {
        $email = request('email');
        $password = request('password');

        // User
        $u = User::where('email', $email)
                ->first();

        if (!empty($u) && Hash::check($password, $u->password)) {
            $user = [];
            $user['name'] = $u->name;
            $user['email'] = $u->email;
            $user['api_token'] = $u->api_token;

            return $user;
        }

        return [];
    }

}
