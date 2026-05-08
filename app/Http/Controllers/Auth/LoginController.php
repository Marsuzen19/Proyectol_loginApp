<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Socialite;

class LoginController extends Controller
{


    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 
            'redirectToGoogle', 
            'handleGoogleCallback'
        ]);
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            $user = \App\Models\User::updateOrCreate([
                'email' => $googleUser->email,
            ], [
                'name' => $googleUser->name,
                'password' => \Illuminate\Support\Facades\Hash::make(bin2hex(random_bytes(10))), 
            ]);

            \Illuminate\Support\Facades\Auth::login($user);

            // LLAMADA A LA FUNCIÓN DE ABAJO
            $this->authenticated(request(), $user);

            return redirect($this->redirectTo);

        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Error al entrar con Google');
        }
    }

    public function authenticated(Request $request, $user)
    {
        if (method_exists($user, 'sessions')) {
            $user->sessions()->create([
                'id' => session()->getId(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
                'payload' => '',
                'last_activity' => time(),
            ]);
        }
    }
}
