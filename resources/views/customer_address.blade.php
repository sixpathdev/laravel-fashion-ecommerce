@extends('layouts.app')

@section('content')

@if (Auth::user())
<div class="container" style="margin-top: 100px;">
    <div class="row mt-4">
        @include('includes.account_sidebar')
        <div class="col-9">
            <div id="address_board" class="card" style="height: 460px;">
                <div class="card-body">
                    <div class="h3 mb-4">Address Book</div>
                    <div class="col-12 text-center">
                        <img src="/images/address_book.svg" class="img-fluid" />
                    </div>
                    <div class="col-12 text-center mt-5">
                        <h3 class="text-muted">Your Address: </h3>
                        <p class="h4">{{ Auth::user()->address ? Auth::user()->address : 'You have not added any address yet!' }}</p>
                        <span class="d-block text-muted">Add your shipping addresses here for a fast purchase experience!</span>
                        <span class="d-block mb-5 text-muted">You will be able to add, modify or delete them at any time.</span>
                        <button onclick="showAddressForm()" class="btn light_footer zero_border text-white">ADD NEW
                            ADDRESS</button>
                    </div>
                </div>
            </div>
            <div class="card" id="address_form" style="display: none;">
                <div class="card-body">
                    <div class="h3 mb-4"><span onclick="closeAddressForm()"
                            style="cursor:pointer; position: relative; top: -4px;"><img class="img-fluid"
                                src="/images/arrow.svg" /></span> Add a New Address</div>

                    <div class="col-12 text-center mt-5">
                        <div class="h3 mb-4">Details</div>
                        @if (Session::has('update_success'))
                        <div class="alert alert-success text-center">{{ Session::get('update_success') }}</div>
                        @endif
                        @if ($errors->any())
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                        @endif
                        <form method="POST" action="/account/customer/address">
                            @csrf
                            @method('PATCH')
                            <form>
                                <div class="form-group">
                                    <textarea name="address" class="form-control"
                                        placeholder="Fill in your current shipping address" id="" cols="8"
                                rows="9">{{ Auth::user()->address ? Auth::user()->address : '' }}</textarea>
                                </div>
                                <div class="form-row mt-5 mb-5">
                                    <div class="col">
                                        <input type="text" name="state" class="form-control customer_edit_form"
                                            placeholder="State" value="{{ Auth::user()->state ? Auth::user()->state : '' }}">
                                    </div>
                                    <div class="col">
                                        <input type="text" name="city" class="form-control customer_edit_form"
                                            placeholder="City" value="{{ Auth::user()->city ? Auth::user()->city : '' }}">
                                    </div>
                                </div>
                                <button type="submit" class="btn light_footer w-100 text-white">SUBMIT</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
@include('unauthorized')
@endif

@endsection