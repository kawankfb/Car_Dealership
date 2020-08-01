<?php

namespace App\Http\Controllers;

use App\FilterData;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function show($json_string)
    {
        //$product=Product::filterProducts($json_string);
        $product=Product::find($json_string);
        if($product==null)
        return response('{
            "message": "The given data was invalid.",
            "errors": {
                "id":"No such Product exists."}
            }',$status=404);
       return $product;
    }
    public function index()
    {
        //$products =Product::filterProducts("{}");
        $products =Product::all();
        return $products;
        
        //return FilterData::getFilterData();
    }

    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'price'=>'required',
            'title'=>'required',
            'explanation'=>'required',
            'distance'=>'required',
            'damage'=>'required',
            'production_date'=>'required',
            'color'=>'required',
            'manufacturer'=>'required',
            'model'=>'required',
            'user_id'=>'required',
            'fuel_type'=>'required',
            'province'=>'required',
            'city'=>'required',
            'admin_id'=>'required',
            'car_type'=>'required',
            'img_1'=>'image|nullable|max:1999',
            'img_2'=>'image|nullable|max:1999',
            'img_3'=>'image|nullable|max:1999',
            'img_4'=>'image|nullable|max:1999',
            'img_5'=>'image|nullable|max:1999',
            'img_6'=>'image|nullable|max:1999',
            'img_7'=>'image|nullable|max:1999',
            'img_8'=>'image|nullable|max:1999'
        ]);
        $product=Product::create($request->all());
        $id=$product->id;
        $pathToStoreImages='/public/product_images/'.$id;
        //File::makeDirectory($pathToStoreImages);
        Storage::disk('local')->makeDirectory('public'."/product_images".'/'.$id);
        $imgNumber=1;
        while($imgNumber<=8){
            if($request->hasFile('img_'.$imgNumber)){
                $extension=$request->file('img_'.$imgNumber)->getClientOriginalExtension();
                $img_path= $request->file('img_'.$imgNumber)->storeAs($pathToStoreImages,'img_'.$imgNumber.'.'.$extension);
                $imgField='img_'.$imgNumber;
                $product->$imgField=$img_path;
                $product->save();
                }
                $imgNumber++;
        }
            return $product;
    }
}
