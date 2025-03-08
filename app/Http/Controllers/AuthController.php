<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){
        if (Auth::attempt($request->only('email','password'))) {
            if (Auth::user()->role === 'admin') {
                return redirect('/admin');
            } else {
                return redirect('/');
            }
            
        } else {
            toast('Email atau Password salah','error');
            return redirect()->back();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function register(){
        return view('register');
    }

    public function register_insert(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $register = new User();
        $register->name = $request->name;
        $register->email = $request->email;
        $register->password = Hash::make($request->password);
        $register->role = 'user';
        
        if ($register->save()) {
            toast('Berhasil Mendaftar Akun','success');
            return redirect()->route('login');
        } else {
            toast('Gagal Mendaftar Akun','error');
            return redirect()->route('login');
        }
    }
}
