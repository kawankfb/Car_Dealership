<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{
    public function show($json_string){
       return Product::filterProducts($json_string);
    }
    public function index(){
        return Product::filterProducts("{}");
    }

}
