<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthenticationController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function register(Request $request)
    {
        $validated_data = $request->validate([
            'register_name' => 'required',
            'register_email' => 'required|email',
            'register_password' => 'required|confirmed',
        ]);

        $data = [
            'name' => $validated_data['register_name'],
            'email' => $validated_data['register_email'],
            'password' => $validated_data['register_password']
        ];

        $data['email'] = strtolower($data['email']);
        // Meng-enskripsi password
        $data['password'] = bcrypt($data['password']);
        // Menambahkan data user
        User::create($data);
        return redirect('/autentikasi')->with('registered', 'Berhasil mendaftar, silahkan login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            if ($remember) {
                Cookie::queue('login_name', $request->name, 10080);
                Cookie::queue('login_password', $request->password, 10080);
            } else {
                Cookie::queue(Cookie::forget('login_name'));
                Cookie::queue(Cookie::forget('login_password'));
            }
            $request->session()->regenerate();
            if (Auth::user()->role == 'admin') {
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->intended('/');
            }
        }

        $user_exist = User::where('name', $request->name)->exists();

        if (!$user_exist) {
            return back()->withInput()->withErrors(['username_not_found' => 'Username tidak ditemukan']);
        }

        # Password salah
        return back()->withInput()->withErrors(['password_wrong' => 'Password salah']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
