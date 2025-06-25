<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerForm(){
        return view('register');
    }

    public function registerInsert(Request $request){
        // return $request;die;
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'dob' => 'required|date',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|digits:10|unique:users,phone',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'password' => [
                'required',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[^a-zA-Z0-9]/',
            ],
        ]);
        $count = User::where('email',$request->email)->count();
        if($count>0){
            return redirect()->back()->with('error','Warning! The value you entered is already in the list email id.');
        }
        $count = User::where('phone',$request->phone)->count();
        if($count>0){
            return redirect()->back()->with('error','Warning! The value you entered is already in the list phone number.');
        }

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $photoimg = time().rand(1000,9999).'.'.$file->extension();
            $file->move(public_path('photoimage/'),$photoimg);

            $pimage = array_merge($request->except('_token','_method','photo'),['photo'=>$photoimg]);
        }
        try {
            User::create($pimage);
            return redirect()->back()->with('success','register successfully and keep login!!');
        } catch (\Exception $ex) {
            return $ex;
            return redirect()->back()->with('error','register failed!!');
        }

    }

    public function loginForm(){
        return view('login');
    }

    public function login(Request $request){
        try {
            // Check if the email exists in users table
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return redirect()->route('registerform')->with('error', 'You are not registered. Please register first.');
            }
            // Try to authenticate user
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                return redirect()->route('user.index')->with('success','Login SuccessFully!!');
            }else{
                return redirect()->back()->with('error','Your Credential Does Not Match!!');
            }
            
        } catch (\Exception $ex) {
            // return $ex;
            return redirect()->back()->with('error','Login Failed!!');
        }
    }

    public function logout(){
        Auth::logout();
        session()->flush();
        return redirect()->route('login')->with('success','Logout Successfully!!');
    }


}
