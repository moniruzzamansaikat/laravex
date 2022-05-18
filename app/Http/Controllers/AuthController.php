<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest'])->except('handle_logout');
    }

    public function login()
    {
        return view('front.user.login');
    }

    public function handle_login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if (!auth()->attempt($request->only('username', 'password'), $request->remember)) {
            return back()->with('wrong', 'Wrong username or password');
        }

        return redirect('/');
    }

    public function register()
    {
        return view('front.user.register');
    }

    public function handle_register(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'department' => 'required',
            'semester' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'department' => $request->department,
            'semester' => $request->semester,
        ]);

        auth()->attempt($request->only('username', 'password'));

        return redirect('/');
    }

    public function handle_logout()
    {
        auth()->logout();
        return redirect('/');
    }

}
