<?php

namespace App\Repositories;

use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReportRepository{
    protected $report;
    
    public function __construct(Report $report)
    {
        $this->report = $report;
    }
    
    public function save($data){
        $report = new $this->report;
        
        $report->user_id = Auth::user()->id;
        $report->tipe_laporan = $data['tipe_laporan'];
        $report->nama_terlapor = $data['nama_terlapor'];
        
        if($data['tipe_laporan'] == 'rekening'){
            $report->bank = $data['bank'];
            $report->nomor_rekening = $data['nomor_rekening'];
            $report->platform = $data['platform'];
        }
        
        $report->kontak_pelaku = $data['kontak_pelaku'];
        $report->kronologi = $data['kronologi'];
        $report->total_kerugian = $data['total_kerugian'];
        $report->file_bukti = $data['file_bukti'];
        
        $names = [];
        
        foreach($data['file_bukti'] as $userImage)
        {
            $hash_name = pathinfo($userImage->hashName());
            $imageName = md5(time().$hash_name['filename']).'.'.$userImage->extension();
            Storage::putFileAs('report_images/'.Auth::user()->id, $userImage, $imageName);
            array_push($names, $imageName);
        }
        
        $report->file_bukti = json_encode($names);
        // dd($report->file_bukti); die();
        
        $report->save();

        return $report->fresh();
    }

    public function getReportByUserID(){
        return Report::where('user_id', Auth::user()->id)->get();
    }

    public function getBankReportByUserID(){
        return Report::where('user_id', Auth::user()->id)
                        ->where('tipe_laporan', 'rekening')
                        ->get();
    }

    public function getPhoneReportByUserID(){
        return Report::where('user_id', Auth::user()->id)
                        ->where('tipe_laporan', 'telepon')
                        ->get();
    }
    
    public function getReport($id){
        return Report::where('user_id', Auth::user()->id)
                        ->where('id', $id)
                        ->firstOrFail();
    }

    public function putReport($id, $input){
        $report = $this->getReport($id);

        if(!$report->file_bukti){
            $names = [];
        }

        if($report->file_bukti){
            $names = json_decode($report->file_bukti);
        }

        if(isset($input['file_bukti'])){
            foreach($input['file_bukti'] as $userImage)
            {
                $hash_name = pathinfo($userImage->hashName());
                $imageName = md5(time().$hash_name['filename']).'.'.$userImage->extension();
                Storage::putFileAs('report_images/'.Auth::user()->id, $userImage, $imageName);
                array_push($names, $imageName);
            }
            $input['file_bukti'] = json_encode($names);
        }

        return $report->update($input);
    }
}

?>