<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\provinces;
use App\Cities;

class ProvincesController extends Controller
{
    //
    public function jsonProvincesList(){
        $provinces =provinces::all();
        
       /* foreach($provinces as $province)
        {
            $jsonEncodedProvince=json_encode($province);  
            echo $jsonEncodedProvince;
        }
    */
        return view('provinces',[
            'provinces' => $provinces
        ]);
    }
}
