@extends('layouts.app')

@section('content')

@if (Auth::user())
<div class="container">
    <div class="row mt-4">
        @include('includes.account_sidebar')
        <div class="col-9">
            <div id="address_board" class="card" style="height: 460px;">
                <div class="card-body">
                    <div class="h3 mb-4">Orders</div>
                    <div class="col-12 text-center">
                        <img src="/images/orders.svg" class="img-fluid" />
                    </div>
                    <div class="col-12 text-center mt-5">
                        <p>You have placed no orders yet!</p>
                        <span class="d-block">All your orders will be saved here for you to access their state
                            anytime.</span>
                        <a href="/">
                            <button onclick="showAddressForm()"
                                class="btn light_footer zero_border text-white mt-5">CONTINUE SHOPPING</button>
                        </a>
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