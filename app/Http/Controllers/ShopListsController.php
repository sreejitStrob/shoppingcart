<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
use App\Cart;
class ShopListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_products=Product::all();
        return view('shoppinglist.shoppinglist')->with('all_items',$all_products);
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

    public function showcart()
    {
        $items_in_cart = DB::table('carts')
            ->leftJoin('products', 'carts.product_id_true', '=', 'products.id')
            ->where('carts.user_id','=','1')
            ->get();
            
       

        return view('shoppinglist.cart')->with('item_in_cart',$items_in_cart);

    }

    public function productdetails($id)
    {
       
        $singleitem = Product::where('id',$id)->first();
        if ($singleitem==NULL) {
            abort(404);
        }
        return view('shoppinglist.description')->with('singleitem',$singleitem);
    }



    public function delete_from_cart($id)
    {


       
        $res=Cart::where('product_id_true',$id)->delete();
        if($res)
        {

            return "deleted";
        }
        else{

            return "messedup";
        }
       
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
