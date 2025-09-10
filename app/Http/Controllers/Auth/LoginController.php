<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }*/


    public function showLoginForm()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        // Validate login input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('Home.Index')->with('success', 'Login successful');
        }

        // If login fails, redirect back with an error message
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {



        // Save cart session data
        $cart = Session::get('cart');

        Auth::logout();

        // Instead of Session::invalidate(), we regenerate manually
        $request->session()->regenerateToken();

        // Restore cart
        Session::put('cart', $cart);


        return redirect('/')->with('success', 'Logged out successfully.');
    }
}
