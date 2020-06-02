<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cities;
use App\Product;
class CitiesController extends Controller
{
    //
    public function citiesOfProvinceList($province_id){
        $json_encoded_cities =Cities::citiesOfProvinceJSON($province_id);
        $cities =json_decode($json_encoded_cities);
        $json_encoded_products=Product::filterProducts('{}');
    return view('cities',[
        'cities' => $cities,
        'json_encoded_cities' => $json_encoded_cities,
        'json_encoded_products' => $json_encoded_products

    ]);
    }
    public function show($province_id){
        return Cities::citiesOfProvince($province_id);;
    }
    public function index(){
        return "please provide a province_id";
    }
}
