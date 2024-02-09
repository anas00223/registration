<?php

namespace App\Http\Controllers;
use Hash;
use App\Models\user;
use illuminate\Support\Facades\Auth;

use illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class Authmanager extends Controller
{
    public function home(){
        return view('home');
    }
    public function login(){
        return view('login');
    }
    public function registration(){
        return view('rergistration');
    }
    public function loginpost(Request $request){
       $request->validate([
        'email'=>'required',
        'password'=>'required',
       ]);
       $credentials=$request->only('email','password');
       if(Auth::attempt($credentials)){
        $user = Auth::user();
         
            return redirect()->route('home')->with('name', $user->name);

       }
       return redirect(route('login'))->with("error","login details are not valid");
    }
    public function registrationpost(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
           ]);
           $data ['name']=$request->name;
           $data ['email']=$request->email;
           $data ['password']=Hash::make($request->password);
           $user = user::create($data);
           if(!$user){ 
              return redirect(route('registration'))->with("error","registeration failed");
           }
           return redirect(route('login'))->with("success","registration success");
    }
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
