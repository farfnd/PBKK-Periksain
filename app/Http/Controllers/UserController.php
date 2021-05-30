<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUserDetail;
use App\Http\Requests\UpdateUserPassword;

class UserController extends Controller
{
    function show_signup(){
        return view('akun.sign-up');
    }

    function show_signin(){
        if(Auth::check()){
            return redirect(route('get_account_setting'));
        }

        return view('akun.sign-in');
    }

    function store_user(StoreUser $request){
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user'
        ]);

        return view('akun.sign-in', ['email' => $request->email]);
    }

    function auth_user(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect(route('get_account_setting'));
        }else{
            return view('akun.sign-in', ['error_msg'=>'Email atau password salah', 'email'=>$request->email]);
        }
    }

    function logout_user(){
        Auth::logout();
        return redirect(route('home'));
    }

    public function show_settings(){
        if(Auth::user()->role != 'user'){
            return "Anda tidak berhak mengakses halaman ini";
        }
        return view('akun.settings_profile');
    }

    public function update_user_detail(UpdateUserDetail $request){
        if(Auth::user()->role != 'user'){
            return "Anda tidak berhak mengakses halaman ini";
        }

        if(!Auth::attempt(['email' => Auth::user()->email, 'password' => $request->password_validation])){
            return redirect()->route('get_account_setting')->with('account_update_failed', 'Password salah!');
        }

        $emailexist = User::where('email', $request->email)->first();
        // return $emailexist->email;
        if($emailexist){
            if($emailexist->email != Auth::user()->email){
                return redirect()->route('get_account_setting')->with('account_update_failed', 'Email yang akan digunakan telah ada!');
            }
        }

        User::where('id', Auth::user()->id)->update([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email                
        ]);
        return redirect()->route('get_account_setting')->with('account_update_success', 'Data berhasil di update!');
    }

    public function update_user_password(UpdateUserPassword $request){
        if(!Auth::attempt(['email' => Auth::user()->email, 'password' => $request->password_validation])){
            return redirect()->route('get_account_setting')->with('password_update_failed', 'Password salah!');
        }

        User::where('id', Auth::user()->id)->update([
            'password'=>bcrypt($request->new_password)
        ]);
        return redirect()->route('get_account_setting')->with('password_update_success', 'Data berhasil di update!');
    }

    public function show_verify(){
        if(Auth::user()->role != 'user'){
            return "Anda tidak berhak mengakses halaman ini";
        }
        return view('akun.user_verify');
    }

    public function post_verify(Request $request){

    }
}
