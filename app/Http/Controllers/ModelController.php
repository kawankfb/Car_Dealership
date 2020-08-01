<?php

namespace App\Http\Controllers;

use App\Model;

class ModelController extends Controller
{
    public function show($company_id){
        return Model::modelsOfCompany($company_id);
    }
    public function index(){
        return "please provide a company_id";
    }
    //
}
