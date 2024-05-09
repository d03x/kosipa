<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index()
    {
        return Inertia("Login");
    }

    /**
     * @param Request $request
     * @return RedirectResponse|void
     */
    public function doLogin(Request $request){
        $login = $request->validate([
            'email' => 'required',
            'password'=>'required'
        ]);

        try {
            if(!Auth::attempt($login,true)) {
                return Redirect::back()->withInput($login)->withErrors([
                    'email' => "Email atau password salah"
                ]);
            }
            return Redirect::route('dashboard');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return Redirect::back()->withInput($login);
        }

    }
}
