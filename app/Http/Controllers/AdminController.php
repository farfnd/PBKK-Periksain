<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\ReportService;

class AdminController extends Controller
{
    protected $reportService;

    public function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }

    function show_admin_login(){
        if(Auth::check()){
            if(Auth::user()->role == 'admin'){
                return redirect(route('admin.show_dashboard'));
            }else{
                Auth::logout();
                return view('admin.login', ['error_msg'=>'Anda bukan admin']);
            }
        }

        return view('admin.login');
    }

    function show_dashboard(){
        return view('admin.dashboard');
    }

    function auth(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            $client_ip = $request->ip();
            $client_browser = $request->header('User-Agent');

            $details = [
                'title' => 'Seseorang berhasil login menggunakan akun anda : '.$request->email,
                'body' => 'Login berhasil dari IP : '.$client_ip."\n"."User-Agent : ".$client_browser
            ];

            $user = User::where('email', $request->email)->firstOrFail();
            $token = $user->createToken('auth_token')->plainTextToken;

            session(['Authorization' => 'Bearer '.$token]);

            if(Auth::user()->role == 'admin'){
                return redirect(route('admin.show_dashboard'));
            }else{
                Auth::logout();
                return view('admin.login', ['error_msg'=>'Anda bukan admin', 'email'=>$request->email]);
            }
        }else{
            return view('admin.login', ['error_msg'=>'Email atau password salah', 'email'=>$request->email]);
        }
    }

    function logout(){
        Auth::logout();
        return redirect(route('home'));
    }

    function show_laporan(){
        return view('admin.show_report');
    }

    function view_laporan($id){
        $result = $this->reportService->readReportbyID($id);
        // return $result;
        if($result["tipe_laporan"] == 'rekening'){
            return view('admin.view_bank', ['report' => $result]);            
        }else{
            return 'view belum ada';
        }
    }

    function respon_laporan(Request $request){
        $id = $request->id;
        $status = $request->status_respon;

        $row = Report::findOrFail($id);
        $row->terverifikasi = $status == 'verifikasi' ? 1 : 0;
        $row->save();

        $result = $this->reportService->readReportbyID($id);
        if($request->tipe_laporan == 'rekening'){
            return view('admin.view_bank', ['report' => $result]);            
        }else{
            return 'view belum ada';
        }
    }

    function getAllReport(){
        return Report::all();
    }
}
