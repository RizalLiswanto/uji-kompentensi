<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index(){
    return view('/login');
    }

    function postlogin(Request $request){
        $request->validate([
            'username'=> 'required',
            'password'=> 'required'
        ],[ 
            'username.required'=>"username kosong",
            'password.required'=>"password kosong"

        ]);
        $cek =[
            'username'=> $request->username,
            'password'=> $request->password
        ];

       if(Auth::attempt($cek))
       {
        $request->session()->regenerate();
        $user = Auth::user();
        if ($user->level_id == '1') {
            return redirect()->intended('/home');
        }
        else if ($user->level_id == '2') {
            return redirect()->intended('/');
        }   
        return redirect()->intended('/');
    }
        return redirect('/home');

       
       return redirect('/')->with('error',"username atau password salah");
    
    }
    function logout(){
      auth::logout();
      return redirect('/');

     
     }

    function registrasi(){
        return view('/registrasi');
        }

    function simpanregister(Request $request){
        $user =[
        'username'=>$request->username,
        'nama'=>$request->nama,
        'email'=>$request->email,
        'password'=>bcrypt($request->password),
        'alamat'=>$request->alamat,
        'jenis_kelamin'=>$request->jenis_kelamin,
        'tanggal_lahir'=>$request->tanggal_lahir,
        'tempatlahir'=>$request->tempatlahir,
        'nomor'=>$request->no_telepon,
        'level_id'=>$request->level_id
       




        ];
        User::create($user);
        return redirect('/login')->with('success',"Akun berhasil di daftarkan");
    }
}
