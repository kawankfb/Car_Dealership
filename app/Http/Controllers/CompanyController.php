<?php

namespace App\Http\Controllers;

use App\Company;

class CompanyController extends Controller
{
    public function show($company_id){
    return Company::getCompany($company_id);
    
}
public function index(){
    return Company::all();
}
}
