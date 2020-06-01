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
    public function show($province_id){
        //return provinces::getProvince($province_id);
        return provinces::getNeighbourProvince($province_id);
    }
    public function index(){
        return provinces::all();
    }
}
