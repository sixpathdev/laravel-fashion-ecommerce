<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart_contents = Cart::all()->where('product_createdby', Auth::id());
        $cart_contents2 = Cart::all()->where('product_createdby', Auth::id());
        $cart_items_total_price = 0;
        for($i=0; $i<count($cart_contents); $i++) {
            $cart_items_total_price += (int)$cart_contents[$i]->product_price;
        }
        // dd($cart_items_total_price);
        return view('cart', compact('cart_contents', 'cart_contents2', 'cart_items_total_price'));
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
        $cart_product = new Cart();
        $cart_product->product_id = $request->input('product_id');
        $cart_product->product_name = $request->input('product_name');
        $cart_product->product_qty = $request->input('product_quantity');
        $cart_product->product_price = (int) $request->input('product_price') * (int) $request->input('product_quantity');
        $cart_product->product_image = $request->input('product_image');
        $cart_product->product_createdby = $request->input('product_createdby');
        $cart_product->save();

        $request->session()->flash('update_success', 'Product added to cart');
        return redirect('/cart');
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
    public function update(Request $request)
    {
        $initial_product_price1 = Product::findOrFail($request->input('product_id'));
        $initial_product_price2 = $initial_product_price1->price;

        // $initial_product_price = $request->input('initial_product_price');

        (int) $current_price = (int) $initial_product_price2 * $request->input('product_quantity');

        DB::table('carts')
            ->where('product_createdby', Auth::id())
            ->where('id', $request->input('id'))
            ->where('product_id', $request->input('product_id'))
            ->update([
                'product_qty' => $request->input('product_quantity'),
                'product_price' => $current_price,
            ]);

        $request->session()->flash('update_success', 'Quantity updated successfully');
        return redirect('/cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $cart_item = Cart::findOrFail($request->input('cart_item_id'));
        $cart_item->delete();

        $request->session()->flash('update_success', 'Cart is now empty');
        return redirect()->back();
    }
}
