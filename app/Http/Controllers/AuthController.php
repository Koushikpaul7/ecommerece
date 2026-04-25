<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Showlogin()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::guard('admin')->user();

            if (in_array($user->role, ['admin', 'superadmin'])) {
                return redirect()->intended(route('admin.dashboard'));
            }

            Auth::guard('admin')->logout();
            $request->session()->regenerateToken();

            return back()->withErrors([
                'email' => 'You do not have admin access.',
            ]);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function showRegistrationForm()
    {
        return view('frontend.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        Auth::guard('web')->login($user);

        return redirect()->route('frontend.index')->with('success', 'Registration successful. Welcome to our store!');
    }

    public function showUserLogin()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('frontend.index');
        }

        return view('frontend.auth.login');
    }

    public function userLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::guard('web')->user();

            if ($user->role === 'user') {
                return redirect()->intended(route('frontend.index'));
            }

            Auth::guard('web')->logout();
            $request->session()->regenerateToken();

            return back()->withErrors([
                'email' => 'Please use the admin login page.',
            ]);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->regenerateToken();

        return redirect()->route('user.login');
    }
}
