@extends('layouts.app')

@section('content')

@if (Auth::user())
<div class="container py-5" style="background-color: #ffffff;margin-top: 100px;">
    <div class="row">
        <div class="col-12">
            @if (Session::has('update_success'))
            <div class="alert alert-success text-center">{{ session('update_success') }}</div>
            @endif
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
            @endif
            <h5 class="ml-5"><span class="text-muted">Cart</span>
                ({{ count($cart_contents) > 1 ? count($cart_contents)." items" : count($cart_contents)." item" }})</h5>
        </div>
        <div class="container mt-4">
            <div class="row offset-1 text-center">
                <div class="col-5 px-3 border text-muted">ITEM</div>
                <div class="col-2 px-3 border text-muted">QUANTITY</div>
                <div class="col-2 px-3 border text-muted">UNIT PRICE</div>
                <div class="col-2 px-3 border text-muted">SUBTOTAL</div>
            </div>

            @if (count($cart_contents) > 0)

            @foreach ($cart_contents as $cart_item)
            <div class="row offset-1">
                <div class="col-5 px-3 border text-muted font-weight-bold">
                    <div class="row">
                        <div class="col-3 pt-2">
                            <img class="img-fluid" src="{{ $cart_item->product_image }}" />
                        </div>
                        <div class="col-9">
                            {{-- <span class="d-block"><small>Seller: Deeski.com</small></span> --}}
                            <span class="d-block mt-2" style="font-size: 18px; font-weight: 300;">{{ $cart_item->product_name }}</span>
                            <span class="d-block" style="font-size: 12px;">SITE BANNER</span>
                            <div class="row mt-2 mb-1">
                                {{-- <div class="col-6" style="color: #af0000;">
                                    <a href="#">MOVE TO SAVED</a>
                                </div> --}}
                                <div class="col-12 text-center">
                                    <form method="POST" id="cart_item_remove" action="{{ route('cartitemdelete') }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="cart_item_id" value="{{ $cart_item->id }}">
                                        <button type="submit" class="btn btn-default"
                                            style="color: #af0000; position: relative; top: -7px;">
                                            <span style="position: relative; top: -2px;">
                                                <svg version="1.1" width="20px" height="15px" fill="#af0000" id="Capa_1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 422.754 422.754"
                                                    style="enable-background:new 0 0 422.754 422.754;"
                                                    xml:space="preserve">
                                                    <g>
                                                        <path
                                                            d="M349.482,67.188c-10.072-16.498-38.019-29.732-74.715-36.884v-19.74C274.767,4.739,270.029,0,264.203,0h-105.66
                                       c-5.825,0-10.563,4.739-10.563,10.563v19.655c-36.863,7.122-64.98,20.368-75.128,36.896c-1.827,2.976-2.691,7.731-0.502,11.644
                                       c1.078,1.927,3.8,5.16,9.915,5.16H340.23c6.246,0,9.061-2.681,10.322-4.929C353.279,74.13,350.422,68.727,349.482,67.188z" />
                                                        <path d="M330.105,114.919H92.642c-4.06,0-7.795,1.604-10.519,4.517c-2.723,2.913-4.072,6.747-3.8,10.796l18.659,277.879
                                       c0.542,8.074,7.566,14.643,15.659,14.643h197.463c8.093,0,15.117-6.569,15.658-14.643l18.66-277.879
                                       c0.272-4.05-1.077-7.884-3.8-10.796C337.9,116.523,334.164,114.919,330.105,114.919z M294.237,316.993H128.51l-7.996-119.077
                                       h181.719L294.237,316.993z" />
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                </svg>
                                            </span>
                                            REMOVE</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2 px-3 border text-muted font-weight-bold">
                    <form method="POST" id="cart_update_{{ $cart_item->id }}" action="{{ route('cartupdate') }}">
                        @csrf
                        @method('PATCH')
                        <div class="row mt-3 mt-md-4 pl-3 pl-md-4">
                            <div class="col-8">
                                <div id="quantity_group_{{ $cart_item->id }}" class="form-group">
                                    <input type="hidden" name="id" value="{{ $cart_item->id }}">
                                    <input type="hidden" name="product_id" value="{{ $cart_item->product_id }}">
                                    <input type="hidden" name="initial_product_price" value="{{ $cart_item->product_price }}">
                                    <input id="quantity_{{ $cart_item->id }}" alt="{{ $cart_item->id }}" class="form-control quantity" type="number" name="product_quantity" value="{{ $cart_item->product_qty }}">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-2 border pt-2 text-muted font-weight-bold pl-5">
                    <span id="product_price" class="d-block text-dark mt-3 product_price">{{ "₦ ".$cart_item->product_price / $cart_item->product_qty }}</span>
                    {{-- <span class="d-block text-muted mt-2" style="text-decoration: line-through;">₦ 1,310</span>
                    <span class="d-block text-success mt-2"><small class="font-weight-bold">Savings: ₦
                            490</small></span> --}}
                </div>
                <div class="col-2 pt-4 pl-5 border font-weight-bold product_price" id="product_price2">
                    <span class="product_price">{{ "₦ ". $cart_item->product_price }}</span>
                </div>
            </div>
            @endforeach

            <div class="row">
                <div class="col-5 offset-6">
                <span id="total_price" class="d-block offset-7 h4 mt-4 mb-3">Total: {{ "₦ ".$cart_items_total_price }}</span>
                <span class="d-block offset-6 text-muted mt-4 mb-1">Shipping fees not included yet</span>
                <span class="d-block offset-6 text-muted mb-4">Customs Fee not included yet</span>
                    <a class="btn btn-default border-none ml-3 text_default py-2" href="/">CONTINUE SHOPPING</a>
                    <button class="btn light_footer text-white border-none ml-4">PROCEED TO CHECKOUT</button>
                </div>
            </div>
            @else
            <div class="row offset-1">
                <div class="col-12 h5 text-center text-muted mt-4">
                    <img class="img-fluid" src="/images/empty-cart.png">
                </div>
                <div class="col-12 h5 text-center text-muted mb-5">Cart is Empty</div>
            </div>
            @endif

        </div>
    </div>
</div>
@else
@include('unauthorized')
@endif

@endsection