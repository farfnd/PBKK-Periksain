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

    public function getDisclaimer($id){
        return Disclaimer::where('user_id', Auth::user()->id)
                        ->where('id', $id)
                        ->firstOrFail();
    }

    public function putDisclaimer($id, $input){
        $disclaimer = $this->getDisclaimer($id);

        if(!$disclaimer->file_bukti){
            $names = [];
        }

        if($disclaimer->file_bukti){
            $names = json_decode($disclaimer->file_bukti);
        }

        if(isset($input['file_bukti'])){
            foreach($input['file_bukti'] as $userImage)
            {
                $hash_name = pathinfo($userImage->hashName());
                $imageName = md5(time().$hash_name['filename']).'.'.$userImage->extension();
                Storage::putFileAs('disclaimer_images/'.Auth::user()->id, $userImage, $imageName);
                array_push($names, $imageName);
            }
            $input['file_bukti'] = json_encode($names);
        }

        return $disclaimer->update($input);
    }

    public function destroyDisclaimer($id){
        return Disclaimer::destroy($id);
    }
}

?>