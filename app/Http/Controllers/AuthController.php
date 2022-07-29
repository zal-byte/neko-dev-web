<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;

class AuthController extends Controller
{
    //
    public function login(){
        return view('auth.login');
    }
    public function signup(){
        return view('auth.signup');
    }



    public function login_post( Request $request ){
        $validator = Validator::make( $request->all(), 
        [
            'email'=>'required',
            'password'=>'required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $cridential = [
            'email'=> $request->input('email'),
            'password'=> $request->input('password')
        ];

        $remember = $request->input('remember') == 'on' ? true : false;
        Auth::attempt( $cridential , $remember );

        if( Auth::check() ){
            return redirect()->route('home');
        }else{
            return back()->withErrors(array('log_err'=>'Invalid email or password'));
        }

    }

    public function signup_post( Request $request )
    {
        $validator = Validator::make( $request->all(), [
            'name'=>'required',
            'email'=>'required',
            'confirm-email'=>'required',
            'password'=>'required',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        if( $request->input('confirm-email') == $request->input('email') ){

            $user = User::where('email','=', $request->input('email') )->first();
            if(!$user){
                if(User::create([
                    'name'=> $request->input('name'),
                    'email'=> $request->input('email'),
                    'password'=> bcrypt( $request->input('password') ),
                ])){
                    return back()->with('success', 'Account successfully created.');
                }else{
                    return back()->with('error', 'Cannot create an account');
                }
            }else{
                return back()->with('user_error', 'This email has been used by another user');
            }
        }else{
            return back()->with('email_error', 'Email doesn\'t match');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
