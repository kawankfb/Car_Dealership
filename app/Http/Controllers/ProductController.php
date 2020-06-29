<?php

namespace App\Http\Controllers;

use App\FilterData;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductResourceCollection;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\File;
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
       return new ProductResource($product);
    }
    public function index():ProductResourceCollection
    {
        //$products =Product::filterProducts("{}");
        $products =Product::all();
        return new ProductResourceCollection($products);
        
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
                else {
                    $fileNameToStore='default_image.jpg';
                }
                $imgNumber++;
        }
        if($request->hasFile('img_'.$imgNumber)){
        $extension=$request->file('img_'.$imgNumber)->getClientOriginalExtension();
        $img_path= $request->file('img_'.$imgNumber)->storeAs($pathToStoreImages,'img_'.$imgNumber.'.'.$extension);
        $imgField='img_'.$imgNumber;
        $product->$imgField=$img_path;
        $product->save();
        $imgNumber++;
        }
        else {
            $fileNameToStore='default_image.jpg';
        }
            return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product,Request $request):ProductResource
    {
        //
        $product->update($request->all());
        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return response()->json();

    }

}
