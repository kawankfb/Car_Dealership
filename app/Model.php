<?php

namespace App;

use Illuminate\Database\Eloquent\Model as MainModel;
use Illuminate\Support\Facades\DB;

class Model extends MainModel
{
    public static function modelsOfCompany($company_id){
        return DB::table('models')->where('company_id', $company_id)->get();

    }
}
