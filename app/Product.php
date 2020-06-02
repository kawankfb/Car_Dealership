<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Product extends Model
{
    public static function filterProducts(String $json_string){
        $ppp=10; //ppp stands for products per page meaning the number of products we show to the cutomer per page
        $filterArguments=json_decode($json_string,true);
        $products =DB::table('products');
        if(sizeof($filterArguments)==0)
        {
            $products=$products->offset(0);
        }
        else {
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
            else
            $products=$products->latest();

            if(isset($filterArguments["page"] ))
            {
        $pageNumber=$filterArguments["page"];
        $products=$products->offset($ppp*$pageNumber);
            }
        
        }
        
        return $products->limit($ppp)->get();
    }
    
    //
}
