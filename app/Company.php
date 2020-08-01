<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    public static function getCompany($company_id){
        return json_encode(DB::table('companies')->where('id', '=', $company_id)->first());
    }
    //
}
