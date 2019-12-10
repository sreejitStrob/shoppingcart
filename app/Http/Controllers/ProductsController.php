<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('products.addproduct');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        $image_name_arr=array();
           if($request->hasFile('file')){
                foreach($request->file as $singlefile)
                {
                  
                    $filename=uniqid().".".$singlefile->getClientOriginalExtension();
                    $destinationPath = 'upload';
                     $singlefile->move($destinationPath,$filename);
                     array_push($image_name_arr,$filename);



                }
                
                
                    $add_product=new Product;
                    $add_product->product_name=$request->product_title;
                    $add_product->category=$request->product_category;
                    $add_product->price=$request->price;
                    $add_product->description=$request->description;
                    $add_product->primary_image=$image_name_arr[0];
                    $add_product->img2=$image_name_arr[1];
                    $add_product->img3=$image_name_arr[2];
                    $add_product->img4=$image_name_arr[3];
                    $add_product->img5=$image_name_arr[4];
                    $add_product->save();

                    if(!$add_product->save()) {
                            return response()->json([
                                'error' => true,
                                'errors' => $add_product->errors()
                            ]);
                        }

                        // Contact created if reached here...
                        return response()->json(['status' => "success"]);







           }
                // dd($request->file);

            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $all_products= Product::all();
        return view('products.listproducts')->with('all_items',$all_products);
    }
    

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
    public function update(Request $request, $id)
    {
        //
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
    }
}
