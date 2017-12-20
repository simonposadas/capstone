<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class LoginController extends Controller
{
	public function doRegister(){
        DB::table('users')->insert(
            [
            'username' => $_POST['username'],
            'password' => bcrypt($_POST['password']),
            ]
        );
        return redirect('/');
	}
    public function doLogin(Request $req){

        // $user = $req->input('username');
        // $pass = $req->input('password');

        // if(Auth::attempt(['username'=> $user ,'password'=> $pass ])){
            return redirect('/admin/dashboard');  
        // }
        // else{
        //     return redirect()->back()->with('message',['text'=>'Wrong Username and/or Password.']);
        // } 
    }
}
