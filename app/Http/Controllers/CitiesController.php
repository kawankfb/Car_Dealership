<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cities;
use App\FilterData;
use App\Product;
class CitiesController extends Controller
{
    //
    public function citiesOfProvinceList($province_id){
        /*$cities =Cities::citiesOfProvince($province_id);
    return view('cities',[
        'cities' => $cities
    ]);*/
    echo json_encode(FilterData::getFilterData()) ;

}
    public function show($province_id){
        return Cities::citiesOfProvince($province_id);;
    }
    public function index(){
        return "please provide a province_id";
    }
}
