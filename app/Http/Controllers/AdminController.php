<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Disclaimer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\ReportService;
use Illuminate\Support\Facades\DB;

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
        // Get Total Laporan
        $total_laporan = Report::count();
        $total_user = User::count();
        $total_rugi = 0;
        $report5 = Report::take(10)->get();

        // return $report5;

        $query = Report::all();
        foreach($query as $data){
            $total_rugi += (int) $data->total_kerugian;
        }

        return view('admin.dashboard', [
            'total_laporan' => $total_laporan,
            'total_user' => $total_user,
            'total_rugi' => "Rp. ".number_format($total_rugi,2,',','.'),
            'reports' => $report5
        ]);
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
            return view('admin.view_phone', ['report' => $result]);
        }
    }

    function respon_laporan(Request $request){
        $id = $request->id;
        $status = $request->status_respon;

        $row = Report::findOrFail($id);
        $row->terverifikasi = $status == 'verifikasi' ? 1 : 0;
        $row->save();

        return $this->show_laporan();
        // $result = $this->reportService->readReportbyID($id);
        // if($request->tipe_laporan == 'rekening'){
        //     return view('admin.view_bank', ['report' => $result]);            
        // }else{
        //     return 'view belum ada';
        // }
    }

    function getAllReport(){
        return Report::all();
    }

    // Sanggahan
    function show_sanggahan(){
        // return view('admin.show_disclaimer');
        $result = DB::table('disclaimers')
            ->join('reports', 'disclaimers.id_laporan', '=', 'reports.id')
            ->select('disclaimers.id', 'reports.tipe_laporan', 'reports.nama_terlapor', 'disclaimers.created_at', 'disclaimers.terverifikasi')
            ->get();
        return view('admin.show_disclaimer', ['disclaimers' => $result]);
    }

    function view_sanggahan($id){
        // $result = $this->reportService->readReportbyID($id);
        $result = DB::table('disclaimers')
            ->join('reports', 'disclaimers.id_laporan', '=', 'reports.id')
            ->join('users', 'disclaimers.user_id', '=', 'users.id')
            ->select('disclaimers.id', 'disclaimers.id_laporan', 'disclaimers.sanggahan', 'reports.nama_terlapor', 'users.first_name', 'users.last_name', 'disclaimers.terverifikasi')
            ->where('disclaimers.id', $id)
            ->first();
        
        // return json_encode($result);

        return view('admin.view_disclaimer', [
            'sanggahan' => $result
        ]);
    }

    function respon_sanggahan(Request $request){
        $id = $request->id;
        $status = $request->status_respon;

        $row = Disclaimer::findOrFail($id);
        $row->terverifikasi = $status == 'verifikasi' ? 1 : 0;
        $row->save();

        return $this->show_sanggahan();
    }

    function getAllDisclaimer(){
        // return Report::all();
        // $result = DB::table('disclaimers')
        //     ->join('reports', 'disclaimers.id_laporan', '=', 'reports.id')
        //     ->select('disclaimers.id', 'reports.tipe_laporan', 'reports.nama_terlapor', 'disclaimers.created_at', 'disclaimers.terverifikasi')
        //     ->get();

        $result = DB::table('disclaimers')
            ->join('reports', 'disclaimers.id_laporan', '=', 'reports.id')
            ->join('users', 'disclaimers.user_id', '=', 'users.id')
            ->select('disclaimers.id', 'disclaimers.sanggahan', 'reports.nama_terlapor', 'users.first_name', 'users.last_name')
            ->get();
            
        return $result;
        
    }
}
