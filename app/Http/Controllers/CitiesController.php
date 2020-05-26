<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cities;
class CitiesController extends Controller
{
    //
    public function citiesOfProvinceList($province_id){
        $json_encoded_cities =Cities::citiesOfProvinceJSON($province_id);
        $cities =json_decode($json_encoded_cities);
    return view('cities',[
        'cities' => $cities,
        'json_encoded_cities' => $json_encoded_cities
    ]);
    }
}
