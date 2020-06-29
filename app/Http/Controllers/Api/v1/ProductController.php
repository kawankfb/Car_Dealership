<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductResourceCollection;
use App\Product;

class ProductController extends Controller
{
    public function show($json_string):ProductResource
    {
        $product=Product::find($json_string);
       return new ProductResource($product);
    }
    public function index():ProductResourceCollection
    {
        $products =Product::all();
        return new ProductResourceCollection($products);
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
            'car_type'=>'required'
        ]);
        $product=Product::create($request->all());
            return new ProductResource($product);
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
