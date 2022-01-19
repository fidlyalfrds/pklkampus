<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MasukController extends Controller
{
    public function index()
    {
    	return view('login.index');
    }

    public function masuk(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);
        
        if (Auth::attempt($credentials)) {
                session(['berhasil_login' => 'true']);
            // $request->session()->regenerate();

            return redirect('dashboard')->with('pesan', 'Login Berhasil !');;
        }
        return back()->with('LoginError', 'Login Gagal!');
    }

    	// $data = User::where('email',$request->email)->firstOrFail();
    	// if ($data){
    	// 	if(Hash::check($request->password,$data->password)){
    	// 		return view('dashboard');
    	// 	}
    	// }
    	// return redirect('/')->with('message','Email atau Password Salah!');


    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }

    // public function getNamaAdmin($id)
    // {
    //     $namauser = User::findOrFail($id);
    //     return view('partials.navbar', compact('namauser'));
    // }
}
