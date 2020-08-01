<?php

namespace App\Http\Controllers;

use App\City;

class CityController extends Controller
{
    public function show($province_id){
        return City::citiesOfProvince($province_id);
    }
    public function index(){
        return "please provide a province_id";
    }
}
