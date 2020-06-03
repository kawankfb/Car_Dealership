<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
//created by kawan at 2020/05/26
class Product extends Model
{

    public static function filterProducts(String $json_string){
        
        
        //function to check whether an array only contains integers or not for security reasons
        function isIntArray($array) {
            return array_filter($array, 'is_int') === $array;
        }

        $ppp=30; //ppp stands for products per page meaning the number of products we show to the cutomer per page

        $filterArguments=json_decode($json_string,true);
        $products =DB::table('products');
        if(sizeof($filterArguments)==0)
        {
            $products=$products->offset(0);
        }
        else {
            //start the proccess of building the filtering query

            //if manufacturer element is set it will show the products from the corresponding manufacturer
            if(isset($filterArguments["manufacturer"] ))
            {
            $manufacturer=$filterArguments["manufacturer"];
            $products=$products->where('manufacturer',$manufacturer);

        //if models element of a manufacturer element is set it will only show the products from the corresponding manufacturer that are of those models
        if(isset($filterArguments["models"] ))
        {
            $models=$filterArguments["models"];
                if(is_array($models) && isIntArray($models))
                    {
                        $products=$products->whereIn('model',$models);
                    }
                else if(is_int($models))
                $products=$products->where('model',$models);
        }

            }

            //if province element is set it will show the products from the corresponding province
            if(isset($filterArguments["province"] ))
            {
            $province=$filterArguments["province"];
            $products=$products->where('province',$province);

        //if cities element of a province element is set it will only show the products from the corresponding province that are of those cities
        if(isset($filterArguments["cities"] ))
        {
            $cities=$filterArguments["cities"];
                if(is_array($cities) && isIntArray($cities))
                    {
                        $products=$products->whereIn('city',$cities);
                    }
                else if(is_int($cities))
                $products=$products->where('city',$cities);
        }

            }

            //if damage element is set it will filter the products accordingly
            if(isset($filterArguments["damage"] ))
            {
                $damage=$filterArguments["damage"];
                    if(is_array($damage) && isIntArray($damage))
                        {
                            $products=$products->whereIn('damage',$damage);
                        }
                    else if(is_int($damage))
                    $products=$products->where('damage',$damage);
            }

            //if color element is set it will filter the products accordingly
            if(isset($filterArguments["color"] ))
            {
                $color=$filterArguments["color"];
                    if(is_array($color) && isIntArray($color))
                        {
                            $products=$products->whereIn('color',$color);
                        }
                    else if(is_int($color))
                    $products=$products->where('color',$color);
            }

            //if fuel_type element is set it will filter the products accordingly
            if(isset($filterArguments["fuel_type"] ))
            {
                $fuel_type=$filterArguments["fuel_type"];
                    if(is_array($fuel_type) && isIntArray($fuel_type))
                        {
                            $products=$products->whereIn('fuel_type',$fuel_type);
                        }
                    else if(is_int($fuel_type))
                    $products=$products->where('fuel_type',$fuel_type);
            }

            //if min_price element is set it will show the products that are the same price or more expensive
            if(isset($filterArguments["min_price"] ))
            {
        $min_price=$filterArguments["min_price"];
        if(is_int($min_price))
                    $products=$products->where('price','>=',$min_price);
            }

            //if max_price element is set it will show the products that are the same price or cheaper
            if(isset($filterArguments["max_price"] ))
            {
        $max_price=$filterArguments["max_price"];
        if(is_int($max_price))
                    $products=$products->where('price','<=',$max_price);
            }


            //if min_price element is set it will show the products that are the same price or more expensive
            if(isset($filterArguments["min_price"] ))
            {
        $min_price=$filterArguments["min_price"];
        if(is_int($min_price))
                    $products=$products->where('price','>=',$min_price);
            }

            //if max_price element is set it will show the products that are the same price or cheaper
            if(isset($filterArguments["max_price"] ))
            {
        $max_price=$filterArguments["max_price"];
        if(is_int($max_price))
                    $products=$products->where('price','<=',$max_price);
            }

            //if max_distance element is set it will show the products that have traveled the max amount that is specified
            if(isset($filterArguments["max_distance"] ))
            {
        $max_distance=$filterArguments["max_distance"];
        if(is_int($max_distance))
                    $products=$products->where('distance','<=',$max_distance);
            }

            //if min_year element is set it will show the products that are of the same year or newer
            if(isset($filterArguments["min_year"] ))
            {
        $min_year=$filterArguments["min_year"];
        if(is_int($min_year))
                    $products=$products->where('production_date','>=',$min_year);
            }

            //if max_year element is set it will show the products that are of the same year or older
            if(isset($filterArguments["max_year"] ))
            {
        $max_year=$filterArguments["max_year"];
        if(is_int($max_year))
                    $products=$products->where('production_date','<=',$max_year);
            }


            //if sortby element is set it will sort the data accordingly
            /* 
            sortby=1 => sort the data from oldest to latest
            sortby=2 => sort the data from cheapest to most expensive
            sortby=3 => sort the data from most expensive to cheapest
            sortby=4 => sort the data from most used car to least used car
            sortby=5 => sort the data from least used car to most used car
            */
            if(isset($filterArguments["sortby"] ))
            {
        $sortby=$filterArguments["sortby"];
        switch ($sortby) {
            case 1:
                $products=$products->oldest();
            break;
                case 2:
                    $products=$products->orderBy('price', 'asc');
                break;
                    case 3:
                        $products=$products->orderBy('price', 'desc');
                    break;
                        case 4:
                            $products=$products->orderBy('distance', 'asc');
                        break;
                            case 5:
                                $products=$products->orderBy('distance', 'desc');
                            break;
        }
            }
            //if sortby element is not set it will sort the data from latest to oldest
            else
            $products=$products->latest();

//if page element is set it will show the requested page accordingly
            if(isset($filterArguments["page"] ))
            {
        $pageNumber=$filterArguments["page"];
        $products=$products->offset($ppp*$pageNumber);
            }
//if page element is not set it will show the first page by not setting an offset
            

        }
        
        return $products->limit($ppp)->get();
    }
    
    //
}
