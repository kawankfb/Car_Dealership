<?php

namespace App\Http\Controllers;

use App\province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function show($province_id){
        return Province::getProvince($province_id);
        
    }
    public function index(){
        return Province::all();
    }
}
