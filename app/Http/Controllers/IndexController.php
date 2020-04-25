<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $cart_contents2 = Cart::all()->where('product_createdby', Auth::id());
        $male_products = Product::where('category', 'Men Wears')->get();
        $female_products = Product::where('category', 'Women Wears')->get();
        $children_products = Product::where('category', 'Children Wears')->get();
        $wearables = Product::where('category', 'Wearables')->get();
        $foot_products = Product::where('category', 'Foot Wears')->get();

        $featured_male = Product::all()->where('category', 'Men Wears')->random();
        $featured_female = Product::all()->where('category', 'Women Wears')->random();
        $featured_children = Product::all()->where('category', 'Children Wears')->random();
        $featured_wearable = Product::all()->where('category', 'Wearables')->random();

        return view('index', compact('categories', 'featured_male', 'featured_wearable', 'featured_female', 'featured_children', 'male_products', 'female_products', 'wearables', 'children_products', 'foot_products', 'cart_contents2'));
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
