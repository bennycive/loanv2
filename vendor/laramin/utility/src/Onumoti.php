<?php

namespace Laramin\Utility;

use App\Lib\CurlRequest;
use App\Models\GeneralSetting;

class Onumoti{

    public static function getData(){
       
       
      
        $general = GeneralSetting::first();
        
        $general->save();
    }

    public static function mySite($site,$className){
        $myClass = VugiChugi::clsNm();
        if($myClass != $className){
            return $site->middleware(VugiChugi::mdNm());
        }
    }
}
