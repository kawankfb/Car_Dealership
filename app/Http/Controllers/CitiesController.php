<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cities;
class CitiesController extends Controller
{
    //
    public function citiesOfProvinceList($province_id){
        $cities =Cities::citiesOfProvince($province_id);
    return view('cities',[
        'cities' => $cities
    ]);
    }
}
