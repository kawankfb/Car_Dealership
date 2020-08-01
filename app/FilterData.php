<?php

namespace App;
use App\CarType;
use App\City;
use App\Color;
use App\Company;
use App\Damage;
use App\Fuel;
use App\Model;
use App\province;
use Illuminate\Database\Eloquent\Model as MainModel;

class FilterData extends Model
{
    public static function getFilterData(){
        $provinces=province::all();
        $i=0;
        foreach($provinces as $province){
            $cities[$i]=City::citiesOfProvince($i);
            $i++;
        }
        $companies=Company::all();
        $i=0;
        foreach($companies as $company){
            $models[$i]=Model::modelsOfCompany($i);
            $i++;
        }
        $filterData=[
            'car_types' => CarType::all(),
            'colors' => Color::all(),
            'damages' => Damage::all(),
            'fuels' => Fuel::all(),
            'provinces' => $provinces,
            'companies' => $companies,
            'models' => $models,
            'cities' => $cities
        ];
        return $filterData;
    }
}
