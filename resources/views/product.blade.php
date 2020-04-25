@extends('layouts.app')

@section('content')

@if (Auth::user())
<div class="container" style="margin-top: 100px;">
    {{-- {{ dd($product) }} --}}
    <div class="row pt-4">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-12 col-md-4">
                    <img class="img-fluid" src="{{ $product->productimages[0]['image'] }}" />
                </div>

                <div class="col-12 col-md-4">
                    <h3>{{ $product->name }}</h3>
                    <div class="mt-3">
                        <h4 style="color: gray;">Description</h4>
                        <p class="text-break" style="font-size: 16px; color: #404040;">{{ $product->description }}</p>
                    </div>
                    <div><span id="product_price" class="h5 font-weight-bold">₦ {{ $product->price }}</span></div>
                    {{-- <div><span>Leather footwear for men</span></div> --}}
                    <form method="POST" action="{{ route('cartdetails') }}">
                        @csrf
                        <div class="form-row">
                            <div class="col-3">
                                <label for="Quantity" style="position: relative; top: 8px;">Quantity</label>
                                <select class="form-control" name="product_quantity" id="exampleFormControlSelect1">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="product_image" value="{{ $product->productimages[0]['image'] }}">
                            <input type="hidden" name="product_price" value="{{ $product->price }}">
                            <input type="hidden" name="product_qty" value="1">
                            <input type="hidden" name="product_name" value="{{ $product->name }}">
                            <input type="hidden" name="product_createdby" value="{{ $product->createdby }}">
                            <div class="col-5" style="position: relative; top: 30px;">
                                <button type="submit" class="btn light_footer text-white font-weight-bold pb-2"
                                    style="border-radius: 0px;">Add to Cart</button>
                            </div>
                        </div>
                    </form>
                    <div class="mt-3 mb-3">
                        <span class="font-weight-bold"><span class="text-muted mr-2">Category:</span>
                            {{ $product->category }}</span>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30.734px"
                                height="30.733px" viewBox="0 0 60.734 60.733" fill="#3b5998"
                                style="enable-background:new 0 0 60.734 60.733;" xml:space="preserve">
                                <g>
                                    <path
                                        d="M57.378,0.001H3.352C1.502,0.001,0,1.5,0,3.353v54.026c0,1.853,1.502,3.354,3.352,3.354h29.086V37.214h-7.914v-9.167h7.914
                               v-6.76c0-7.843,4.789-12.116,11.787-12.116c3.355,0,6.232,0.251,7.071,0.36v8.198l-4.854,0.002c-3.805,0-4.539,1.809-4.539,4.462
                               v5.851h9.078l-1.187,9.166h-7.892v23.52h15.475c1.852,0,3.355-1.503,3.355-3.351V3.351C60.731,1.5,59.23,0.001,57.378,0.001z" />
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
                        </div>
                        <div class="col-1 pl-4">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                                style="enable-background:new 0 0 512 512;" xml:space="preserve" height="30.733px"
                                width="30.734px" fill="#38A1F3">
                                <g>
                                    <g>
                                        <path d="M512,97.248c-19.04,8.352-39.328,13.888-60.48,16.576c21.76-12.992,38.368-33.408,46.176-58.016
			c-20.288,12.096-42.688,20.64-66.56,25.408C411.872,60.704,384.416,48,354.464,48c-58.112,0-104.896,47.168-104.896,104.992
			c0,8.32,0.704,16.32,2.432,23.936c-87.264-4.256-164.48-46.08-216.352-109.792c-9.056,15.712-14.368,33.696-14.368,53.056
			c0,36.352,18.72,68.576,46.624,87.232c-16.864-0.32-33.408-5.216-47.424-12.928c0,0.32,0,0.736,0,1.152
			c0,51.008,36.384,93.376,84.096,103.136c-8.544,2.336-17.856,3.456-27.52,3.456c-6.72,0-13.504-0.384-19.872-1.792
			c13.6,41.568,52.192,72.128,98.08,73.12c-35.712,27.936-81.056,44.768-130.144,44.768c-8.608,0-16.864-0.384-25.12-1.44
			C46.496,446.88,101.6,464,161.024,464c193.152,0,298.752-160,298.752-298.688c0-4.64-0.16-9.12-0.384-13.568
			C480.224,136.96,497.728,118.496,512,97.248z" />
                                    </g>
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
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-3 border">
                    <div class="row">
                        <div class="col-12">
                            <div class="border-bottom py-2 text-center font-weight-bold">
                                <span>DELIVERY & RETURNS</span>
                            </div>
                            <div class="row">
                                <div class="col-3">ICON</div>
                                <div class="col-9">
                                    <h5>SHOP4ME</h5>
                                    <p>Express delivery in main cities.</p>
                                </div>
                                <div class="col-3">ICON2</div>
                                <div class="col-9">
                                    <h5>Delivery Information</h5>
                                    <p>Normally delivered between Friday 10 Apr and Monday 13 Apr. Please check exact
                                        dates in the Checkout page.</p>
                                </div>
                                <div class="col-3">ICON3</div>
                                <div class="col-9">
                                    <h5>Return Policy</h5>
                                    <p>Free return within 15 days for Jumia Mall items and 7 days for other eligible
                                        items.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-3 border px-0">
                            <div class="row px-1">
                                <div class="col-12 text-center py-2 font-weight-bold">SELLER INFORMATION</div>
                                <div class="row">
                                    <div class="col-8">
                                        <div style="position: relative; left: 14px;">Reckitt Benckiser Nigeria Ltd</div>
                                        <div style="position: relative; left: 14px;">80% Positive Seller Score</div>
                                    </div>
                                    <div class="col-4">
                                        <button class="btn light_footer text-white"
                                            style="padding: 5px 7px; position: relative; top: 20px; right: 0px;">FOLLOW</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 my-4" style="background-color: whitesmoke; height: 20px;"></div>
        <div class="col-12 mt-1">
            <h4 class="border-bottom">Product details</h4>
            <div class="row px-3">
                <div class="col-12 text-center mt-2">
                    <img class="img-fluid" src="/images/ads_banner/dettol_banner.jpg" />
                </div>
                <div class="col-12 mt-4">
                    <p>Dettol Soap is a bar known for its anti-bacterial agents yet gentle with a variety of fresh
                        fragrances added to its moisturizing action. Perfect for promoting personal hygiene and creating
                        radiant, beautiful and smooth skin.</p>
                    <p>Dettol Bar Soaps keep you healthy and provide 100% better protection vs ordinary soaps.</p>
                    <p>Personal hygiene plays a critical role in preventing the spread of illness and infection. Poor
                        personal hygiene can cause infections, skin complaints, and an unpleasant smell. Reassuringly,
                        Dettol Even tone soap protects from a wide range of illness-causing germs and bacteria to help
                        you and your family stay healthy.</p>
                </div>
            </div>
        </div>
        <div class="col-12 my-4" style="background-color: whitesmoke; height: 20px;"></div>
        <div class="col-12 mt-1">
            <h4 class="border-bottom pb-1">Specifications</h4>
            <div class="row px-3 mt-2">
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="border-bottom">
                                <span>KEY FEATURES</span>
                            </div>
                            <ul class="my-2">
                                <li>Gives maximum protection against unseen germs</li>
                                <li>Enriched with added moisturizers.</li>
                                <li>Gives maximum protection against unseen germs</li>
                                <li>Enriched with added moisturizers.</li>
                                <li>Best Ever Cool comes in a specially formulated formula</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-5 offset-md-1">
                    <div class="card">
                        <div class="card-body pb-2">
                            <div class="border-bottom">
                                <span>WHAT’S IN THE BOX</span>
                            </div>
                            <div>
                                6 bars of 65g of Dettol Even Tone Anti-Bacterial Soap
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5 my-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="border-bottom">
                                <span>SPECIFICATIONS</span>
                            </div>
                            <div class="pt-2"><span class="font-weight-bold">SKU:</span> DE111GR188LBTNAFAMZ</div>
                            <div class="pt-2"><span class="font-weight-bold">NAFDAC No.:</span> 02-3465</div>
                            <div class="pt-2"><span class="font-weight-bold">Model:</span> Even Tone</div>
                            <div class="pt-2"><span class="font-weight-bold">Production Country:</span> Nigeria</div>
                            <div class="pt-2"><span class="font-weight-bold">Product Line:</span> Reckitt Benckiser
                                Nigeria Ltd</div>
                            <div class="pt-2"><span class="font-weight-bold">Weight (kg):</span> 0.4</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 my-4" style="background-color: whitesmoke; height: 20px;"></div>
        <div class="col-12 mt-1">
            <h4 class="border-bottom pb-1">PRODUCT REVIEWS</h4>
            <div class="row px-3 mt-2">
                <div class="col-12 mb-3">
                    <button type="button" class="btn light_footer text-white" data-toggle="modal"
                        data-target="#reviewModal" style="float: right; border-radius: 0px; border: none;">
                        ADD REVIEW
                    </button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" style="top: 60px;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content px-5 py-4">
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputName"
                                        aria-describedby="nameHelp" value="User" style="border-radius: 0px;" disabled>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="review_details" rows="7"
                                        style="border-radius: 0px;"></textarea>
                                </div>
                                <button type="submit" class="btn light_footer text-white float-right"
                                    style="border-radius: 0px; border: none;">SUBMIT REVIEW</button>
                                <button type="submit" class="btn btn-secondary float-right mr-3" data-dismiss="modal"
                                    style="border-radius: 0px;">CLOSE</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-10 mb-3 border-bottom pb-2">
                    <div class="py-2">qwertyuiopkjhgsdfghj</div>
                    <div class="row">
                        <div class="col-7">
                            <span class="pr-2 text-muted">02-04-2020 by</span>
                            <span class="px-1 text-muted"> Prince Ayoade</span>
                        </div>
                        <div class="col-3 offset-2">
                            <span class="text-success">Verified Purchase</span>
                        </div>
                    </div>
                </div>
                <div class="col-10 mb-3 border-bottom pb-2">
                    <div class="py-2">qwertyuiopkjhgsdfghj</div>
                    <div class="row">
                        <div class="col-7">
                            <span class="pr-2 text-muted">02-04-2020 by</span>
                            <span class="px-1 text-muted"> Prince Ayoade</span>
                        </div>
                        <div class="col-3 offset-2">
                            <span class="text-success">Verified Purchase</span>
                        </div>
                    </div>
                </div>
                <div class="col-10 mb-3 border-bottom pb-2">
                    <div class="py-2">qwertyuiopkjhgsdfghj</div>
                    <div class="row">
                        <div class="col-7">
                            <span class="pr-2 text-muted">02-04-2020 by</span>
                            <span class="px-1 text-muted"> Prince Ayoade</span>
                        </div>
                        <div class="col-3 offset-2">
                            <span class="text-success">Verified Purchase</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 my-4" style="background-color: whitesmoke; height: 20px;"></div>
        <div class="col-12 mt-1">
            <h4 class="border-bottom pb-1">More items from this seller</h4>
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="card" style="border: none;">
                        <div class="card-body">
                            <img class="img-fluid" src="/images/foot_wears/foot_wear_2.jpeg" />
                            <span class="d-block text-center">PRODUCT NAME</span>
                            <span class="d-block text-center">PRICE</span>
                            <small class="d-block text-center">DISCOUNT IF AVAILABLE</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card" style="border: none;">
                        <div class="card-body">
                            <img class="img-fluid" src="/images/foot_wears/foot_wear_2.jpeg" />
                            <span class="d-block text-center">PRODUCT NAME</span>
                            <span class="d-block text-center">PRICE</span>
                            <small class="d-block text-center">DISCOUNT IF AVAILABLE</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card" style="border: none;">
                        <div class="card-body">
                            <img class="img-fluid" src="/images/foot_wears/foot_wear_2.jpeg" />
                            <span class="d-block text-center">PRODUCT NAME</span>
                            <span class="d-block text-center">PRICE</span>
                            <small class="d-block text-center">DISCOUNT IF AVAILABLE</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card" style="border: none;">
                        <div class="card-body">
                            <img class="img-fluid" src="/images/foot_wears/foot_wear_2.jpeg" />
                            <span class="d-block text-center">PRODUCT NAME</span>
                            <span class="d-block text-center">PRICE</span>
                            <small class="d-block text-center">DISCOUNT IF AVAILABLE</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 my-4" style="background-color: whitesmoke; height: 20px;"></div>
        <div class="col-12 mt-1">
            <h4 class="border-bottom pb-1">Related items</h4>
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="card" style="border: none;">
                        <div class="card-body">
                            <img class="img-fluid" src="/images/foot_wears/foot_wear_2.jpeg" />
                            <span class="d-block text-center">PRODUCT NAME</span>
                            <span class="d-block text-center">PRICE</span>
                            <small class="d-block text-center">DISCOUNT IF AVAILABLE</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card" style="border: none;">
                        <div class="card-body">
                            <img class="img-fluid" src="/images/foot_wears/foot_wear_2.jpeg" />
                            <span class="d-block text-center">PRODUCT NAME</span>
                            <span class="d-block text-center">PRICE</span>
                            <small class="d-block text-center">DISCOUNT IF AVAILABLE</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card" style="border: none;">
                        <div class="card-body">
                            <img class="img-fluid" src="/images/foot_wears/foot_wear_2.jpeg" />
                            <span class="d-block text-center">PRODUCT NAME</span>
                            <span class="d-block text-center">PRICE</span>
                            <small class="d-block text-center">DISCOUNT IF AVAILABLE</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card" style="border: none;">
                        <div class="card-body">
                            <img class="img-fluid" src="/images/foot_wears/foot_wear_2.jpeg" />
                            <span class="d-block text-center">PRODUCT NAME</span>
                            <span class="d-block text-center">PRICE</span>
                            <small class="d-block text-center">DISCOUNT IF AVAILABLE</small>
                        </div>
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