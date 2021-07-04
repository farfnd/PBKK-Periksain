<?php

namespace App\Repositories;

use App\Models\Disclaimer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DisclaimerRepository{
    protected $disclaimer;

    public function __construct(Disclaimer $disclaimer)
    {
        $this->disclaimer = $disclaimer;
    }

    public function save($data){
        $disclaimer = new $this->disclaimer;

        $disclaimer->user_id = Auth::user()->id;
        $disclaimer->id_laporan = $data['id_laporan'];
        $disclaimer->sanggahan = $data['sanggahan'];

        $names = [];
        
        foreach($data['file_bukti'] as $userImage)
        {
            $imageName = $userImage->getClientOriginalName();
            Storage::putFileAs('disclaimer_images/'.Auth::user()->id, $userImage, $imageName);
            array_push($names, $imageName);
        }
        
        $disclaimer->file_bukti = json_encode($names);
        
        $disclaimer->save();

        return $disclaimer->fresh();
    }

    public function getDisclaimerByUserID(){
        return Disclaimer::where('user_id', Auth::user()->id)->get();
        // return "TEST";
    }
}

?>