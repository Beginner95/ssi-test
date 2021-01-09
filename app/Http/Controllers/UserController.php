<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use \Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function login(UserRequest $request): RedirectResponse
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            session()->flash('success', 'Вы успешно авторизовались');

            return redirect()->route('admin.index');
        }

        return redirect()->back()->with('error', 'Не верный логин или пароль');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('login.create');
    }
}
