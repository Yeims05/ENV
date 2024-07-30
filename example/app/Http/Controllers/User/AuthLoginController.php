<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Repositories\User\EloquentUserRepository;
use Illuminate\Support\Facades\Hash;

class AuthLoginController extends Controller
{
    // Mostrar el formulario de login
    public function showLoginForm()
    {
        return view('login');
    }

    // Procesar el login
    public function login(Request $request)
    {
        // Validar los datos del request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Obtener el email y password del request
        $email = $request->get('email');
        $password = $request->get('password');

        // Crear una instancia del repositorio
        $userRepository = new EloquentUserRepository();

        // Buscar el usuario por email
        $userOrNull = $userRepository->findByEmail($email);

        // Verificar si el usuario existe y si el password es correcto
        if ($userOrNull && Hash::check($password, $userOrNull->password)) {
            // Loguear al usuario
            Auth::login($userOrNull);
            return redirect()->to('/home');
        }

        // En caso de fallar, redirigir con error
        return redirect()->back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }
}
