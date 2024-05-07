<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('index');
        } else {
            return back()->withErrors(['email' => 'Incorrect email or password.'])->withInput($request->only('email'));
        }
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        if ($user) {
            return redirect()->route('login')->with('success', 'تم التسجيل بنجاح! يمكنك الآن تسجيل الدخول.');
        } else {
            return back()->withInput()->withErrors(['registration_failed' => 'حدث خطأ أثناء عملية التسجيل، يرجى المحاولة مرة أخرى.']);
        }
    }
}