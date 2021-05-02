<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function show_signup(){
        return view('akun.sign-up');
    }

    function show_signin(){
        if($this->isAuth()){
            return redirect(route('post_account_setting'));
        }

        return view('akun.sign-in');
    }

    function store_user(Request $request){
        if(strlen($request->password) < 8){
            return view('akun.sign-up', ['error_msg' => 'Password minimal 8 karakter', 'first_name' => $request->first_name, 'last_name'=>$request->last_name, 'email'=>$request->email]);
        }

        if($request->password != $request->confirm_password){
            return view('akun.sign-up', ['error_msg' => 'Password tidak cocok', 'first_name' => $request->first_name, 'last_name'=>$request->last_name, 'email'=>$request->email]);
        }

        $validate_result = User::where('email', $request->email)->first();

        if($validate_result != NULL){
            return view('akun.sign-up', ['error_msg' => 'Email telah digunakan', 'first_name' => $request->first_name, 'last_name'=>$request->last_name, 'email'=>$request->email]);
        }

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => md5($request->password)
        ]);

        return view('akun.sign-in', ['email' => $request->email]);
    }

    function auth_user(Request $request){
        $validate_result = User::where([['email', '=', $request->email], ['password', '=', md5($request->password)]])->first();

        if($validate_result != NULL){
            $request->session()->put('userid', $validate_result->id);
            return redirect(route('post_account_setting'));
        }else{
            return view('akun.sign-in', ['error_msg'=>'Email atau password salah', 'email'=>$request->email]);
        }
    }

    function logout_user(){
        if(session()->has('userid')){
            session()->pull('userid');
        }

        return redirect(route('home'));
    }

    public static function get_user(){
        $query_result = User::where('id', session('userid'))->first();
        if($query_result != NULL){
            return json_encode(['error_msg'=>0, 'first_name'=>$query_result->first_name, 'last_name'=>$query_result->last_name, 'email' => $query_result->email, 'is_verified'=> false]);
        }else{
            return json_encode(['error_msg'=>1]);
        }
    }

    public function isAuth(){
        $account = json_decode($this->get_user());

        if($account->error_msg != 0) return false;
        else return true;
    }

    public function show_settings(){
        if(!$this->isAuth()){
            return redirect(route('get_signin_form'));
        }
        return view('akun.settings_profile');
    }

    public function update_user(Request $request){
        if(!$this->isAuth()){
            return redirect(route('get_signin_form'));
        }

        // return $request->input();

        $query_result = User::where('id', session('userid'))->first();
        if(md5($request->password_validation) != $query_result->password){
            if($request->form_type == 'update_profile'){
                return view('akun.settings_profile', ['profile_msg_error_info'=>'Password salah!']);
            }else{
                return view('akun.settings_profile', ['password_msg_error_info'=>'Password salah!']);
            }
        }else{
            if($request->form_type == 'update_profile'){
                User::where('id', session('userid'))->update([
                    'first_name'=>$request->first_name,
                    'last_name'=>$request->last_name,
                    'email'=>$request->email                
                ]);
                return view('akun.settings_profile', ['profile_msg_success_info'=>'Data berhasil di update!']);    
            }else{
                if($request->new_password != $request->new_password_confirm || strlen($request->new_password) < 8){
                    return view('akun.settings_profile', ['password_msg_error_info'=>'Password baru tidak sama atau kurang dari 8 karakter!']);    
                }else{
                    User::where('id', session('userid'))->update([
                        'password'=>md5($request->new_password)        
                    ]);
                    return view('akun.settings_profile', ['password_msg_success_info'=>'Data berhasil di update!']);    
                }
            }
        }
    }

    public function show_verify(){
        return view('akun.user_verify');
    }

    public function post_verify(Request $request){
        
    }
}
