<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $cart_contents2 = Cart::all()->where('product_createdby', Auth::id());
        return view('manage_category', compact('categories', 'cart_contents2'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'categoryname' => 'string|required',
        ]);

        $category = new Category();
        $category->name = $request->input('categoryname');
        $category->createdby = Auth::id();
        $category->save();

        $request->session()->flash('update_success', 'Category created successfully');
        return redirect('/categories');
    }

    public function update(Request $request, $catid)
    {
        $category = DB::table('categories')->where('id', $catid)->where('createdby', Auth::id())->exists();

        if ($category) {
            DB::table('categories')
                ->where('id', $catid)
                ->update([
                    'name' => $request->input('categoryname'),
                ]);

            $request->session()->flash('update_success', 'Category name updated successfully');
            return redirect('/categories');
        }
    }

    public function destroy(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        $request->session()->flash('update_success', 'Category deleted successfully');
        return redirect()->back();
    }
}
