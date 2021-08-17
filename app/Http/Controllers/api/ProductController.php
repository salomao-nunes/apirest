<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests;
use App\Http\Resources\Product as ProductResource;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product = Product::all();

        return  new ProductResource($product);
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

        $rules=array(

            'name'=>"required|min:2",
            "price"=>"required"

        );

        $validator=Validator::Make($request->all(),$rules);

        if($validator->fails()){
            return $validator->errors();
        }else{
            
            $product = new Product();
            $product->name= $request->input('name');
            $product->price= $request->input('price');
        
            $result=$product->save();

            if($result){
                return ["Result"=>"Data Saved"];

            }else{
                return ["Result"=>"Data Unsaved"];
            }

           // return new ProductResource($product);
            
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       return Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $product= Product::find($id);
        $product->update($request->all());

        return $product;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return Product::destroy($id);
    }

    public function validateData(Request $req){
        
      
    }

   

}
