<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUserDetail;
use App\Http\Requests\UpdateUserPassword;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function isAuth(){
        if(!Auth::check()) return false;
        else return true;
    }
    
    function show_signup(){
        return view('akun.sign-up');
    }

    function show_signin(){
        if(Auth::check()){
            return redirect(route('get_account_setting'));
        }

        return view('akun.sign-in');
    }
    
    function show_admin(){
        if(Auth::user()->role != 'admin') {
            return "Anda tidak berhak mengakses halaman ini";
        }
        return view('admin');
    }

    function create_user_admin(){
        if(Auth::check() && Auth::user()->role == 'admin') {
            return view('auth.register-admin');
        }
    }
    
    function store_user(StoreUser $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        event(new Registered($user));

        Auth::login($user);
        
        $user_x = User::where('email', $request->email)->firstOrFail();
        $token = $user_x->createToken('auth_token')->plainTextToken;

        session(['Authorization' => 'Bearer '.$token]);

        return redirect(route('home'));
    }

    function store_user_admin(StoreUser $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => 'required|string|max:255',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect(route('show_admin'));
    }

    function auth_user(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            $client_ip = $request->ip();
            $client_browser = $request->header('User-Agent');

            $details = [
                'title' => 'Seseorang berhasil login menggunakan akun anda : '.$request->email,
                'body' => 'Login berhasil dari IP : '.$client_ip."\n"."User-Agent : ".$client_browser
            ];

            \Mail::to(Auth::user()->email)->send(new \App\Mail\MailTrap($details));

            $user = User::where('email', $request->email)->firstOrFail();
            $token = $user->createToken('auth_token')->plainTextToken;

            session(['Authorization' => 'Bearer '.$token]);

            if(Auth::user()->role == 'admin'){
                return redirect(route('admin.show_dashboard'));
            }else{
                return redirect(route('home'));
            }
        }else{
            return view('akun.sign-in', ['error_msg'=>'Email atau password salah', 'email'=>$request->email]);
        }
    }

    function logout_user(){
        Auth::logout();
        return redirect(route('home'));
    }

    public function show_settings(){
        // if(Auth::user()->role != 'user'){
        //     return "Anda tidak berhak mengakses halaman ini";
        // }
        return view('akun.settings_profile');
    }

    public function update_user_detail(UpdateUserDetail $request){
        // if(Auth::user()->role != 'user'){
        //     return "Anda tidak berhak mengakses halaman ini";
        // }

        if(!Auth::attempt(['email' => Auth::user()->email, 'password' => $request->user_password_validation])){
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
        return redirect()->route('get_account_setting')->with('account_update_read', 'Data berhasil di update!');
    }

    public function update_user_password(UpdateUserPassword $request){
        if(!Auth::attempt(['email' => Auth::user()->email, 'password' => $request->password_validation])){
            return redirect()->route('get_account_setting')->with('password_update_failed', 'Password salah!');
        }

        User::where('id', Auth::user()->id)->update([
            'password'=>bcrypt($request->new_password)
        ]);
        return redirect()->route('get_account_setting')->with('password_update_read', 'Data berhasil di update!');
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
