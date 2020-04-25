<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Product;
use App\Productimage;
use App\User;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $categories = Category::all();
        $products = Auth::user()->products;
        $cart_contents2 = Cart::all()->where('product_createdby', Auth::id());
        return view('manage_product', compact(['categories', 'products', 'cart_contents2']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //start temporay transaction
        // DB::beginTransaction();

        $this->validate($request, [
            'productName' => 'string|required',
            'productDescription' => 'string|required|min:10',
            'productPrice' => 'string|required',
            'productCategory' => 'required',
            'productSize' => 'required'
        ]);

        $product = new Product();
        $product->name = $request->input('productName');
        $product->description = $request->input('productDescription');
        $product->category = $request->input('productCategory');
        $product->size = $request->input('productSize');
        $product->user_id = Auth::id();
        $product->createdby = Auth::id();
        $product->price = $request->input('productPrice');
        $product->save();

        if ($request->hasFile('productImages')) {
            $allowedfileExtension = ['png', 'jpg', 'jpeg', 'gif'];
            $files = $request->file('productImages');

            foreach ($files as $file) {
                $prodctImage = new Productimage();
                $prodctImage->product_id = $product->id;
                $prodctImage->user_id = Auth::id();
                $extension = $file->getClientOriginalExtension();
                if (in_array($extension, $allowedfileExtension)) {
                    Cloudder::upload($file);
                    $cloudinary_upload = Cloudder::getResult();
                    $prodctImage->image = $cloudinary_upload['url'];
                    $prodctImage->save();
                } else {
                    return redirect()->back()->with(['invalid_extension' => 'You tried to upload an invalid image extension']);
                }
            }
            return redirect()->back()->with(['update_success' => 'Product added successfully']);
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
        $product = Product::findOrFail($id);
        $cart_contents2 = Cart::all()->where('product_createdby', Auth::id());
        return view('product', compact('product', 'cart_contents2'));
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
        $product = DB::table('products')->where('id', $id)->where('createdby', Auth::id())->exists();

        if ($product) {
            DB::table('products')
                ->where('id', $id)
                ->update([
                    'name' => $request->input('name'),
                    'description' => $request->input('description'),
                    'price' => $request->input('price'),
                    'category' => $request->input('category'),
                    'size' => $request->input('size'),
                ]);

            $request->session()->flash('update_success', 'Product details updated successfully');
            return redirect('/categories');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        $request->session()->flash('update_success', 'Product deleted successfully');
        return redirect()->back();
    }
}
