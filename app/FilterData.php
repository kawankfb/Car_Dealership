<?php

namespace App;
use App\Cities;
use App\Car_types;
use App\Colors;
use App\Companies;
use App\Damages;
use App\Fuels;
use App\Models;
use App\provinces;
use Illuminate\Database\Eloquent\Model;

class FilterData extends Model
{
    public static function getFilterData(){
        $provinces=provinces::all();
        $i=0;
        foreach($provinces as $province){
            $cities[$i]=Cities::citiesOfProvince($i);
            $i++;
        }
        $companies=Companies::all();
        $i=0;
        foreach($companies as $company){
            $models[$i]=Models::modelsOfCompany($i);
            $i++;
        }
        $filterData=[
            'car_types' => Car_types::all(),
            'colors' => Colors::all(),
            'damages' => Damages::all(),
            'fuels' => Fuels::all(),
            'provinces' => $provinces,
            'companies' => $companies,
            'models' => $models,
            'cities' => $cities
        ];
        return $filterData;
    }
}
