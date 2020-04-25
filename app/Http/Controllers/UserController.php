<?php

namespace App\Http\Controllers;

use App\Cart;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index()
    {
        $user = User::where('id', Auth::id())->get();
        $cart_contents2 = Cart::all()->where('product_createdby', Auth::id());
        return view('edit_account', compact('user', 'cart_contents2'));
    }


    public function update(Request $request, User $user)
    {

        // dd($request);
        $this->validate($request, [
            'first_name' => 'string|required',
            'last_name' => 'string|required',
            'email' => 'string',
            'dob' => 'required',
            'gender' => 'required',
            'phone' => 'required|max:12',
            'password' => 'required',
        ]);

        $user = DB::table('users')->where('id', Auth::id())->exists();

        if ($user) {
            DB::table('users')
                ->where('id', Auth::id())
                ->update([
                    'first_name' => $request->input('first_name'),
                    'last_name' => $request->input('last_name'),
                    'email' => $request->input('email'),
                    'dob' => $request->input('dob'),
                    'gender' => $request->input('gender'),
                    'phone' => $request->input('phone'),
                    'password' => $request->input('password'),
                ]);

            $request->session()->flash('update_success', 'User details updated successfully');
            return back();
        }
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'confirmed|string|required',
            'password_confirmation' => 'string|required',
        ]);

        $user = DB::table('users')->where('id', Auth::id())->exists();

        if ($user) {
            DB::table('users')
                ->where('id', Auth::id())
                ->update([
                    'password' => Hash::make($request->input('password')),
                ]);

            $request->session()->flash('update_success', 'Password changed successfully');
            return back();
        }
    }

    public function shippingAddress()
    {
        return view('customer_address');
    }

    public function updateShippingAddress(Request $request)
    {
        $this->validate($request, [
            'address' => 'string|required',
            'state' => 'string|required',
            'city' => 'string|required',
        ]);

        $user = DB::table('users')->where('id', Auth::id())->exists();

        if ($user) {
            DB::table('users')
                ->where('id', Auth::id())
                ->update([
                    'address' => $request->input('address'),
                    'state' => $request->input('state'),
                    'city' => $request->input('city'),
                ]);

            $request->session()->flash('update_success', 'Shipping address updated successfully');
            return redirect('account');
        }
    }

    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
