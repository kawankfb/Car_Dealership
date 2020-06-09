<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Models extends Model
{
    //
    public static function modelsOfCompany($company_id){
        return DB::table('models')->where('company_id', '=', $company_id)->get();
        
    }
}
