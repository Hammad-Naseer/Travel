<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    public function Registerform(){
        $data['title'] = 'Create Account';
        return view('login.register',$data);
    }
   
    public function Loginform(){
        $data['title'] = 'Login';
        return view('login.login', $data);
   }
    public function forget_password(){
        $data['title'] = 'Reset Password';
        return view('login.forget',$data);
    }
    public function process_register(Request $request){
      
        $request-> validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'username' => 'required|alpha_num|unique:users|max:255',
            'password' => 'required|max:255',   
        ]);
        $info = array(
            'name' => $request->input('name'),
            'email'  => $request->input('email'),
            'username' => $request->input('username'),
            'password' => Hash :: make($request->input('password')),
        );
       $user = User :: create($info);
        if(!empty($user))
            return redirect(route('login'))->with('message',"User has been creatred !Plaese login ");
        else
         return redirect()->back() -> with('error',"Error! Please Try Again");
     }  

     public function authenticate_user_login(Request $request){
        $request-> validate([
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);
        $cred = array(
            'email'  => $request->input('email'),
            'password' =>$request->input('password'),
        );
        if(Auth ::attempt($cred)){
            return redirect () ->intended ( route('admin.dashboard') );
        }else{ 
            return redirect ()-> back() ->with ('error','Error! Invalid Credientials');
        }
        }
        
}
