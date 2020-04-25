@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-12">
            <img class="img-responsive" src="images/ads_banner.jpg" alt="discount banner" width="100%" />
        </div>
    </div>
    <section class="row mt-4">
        <div class="col-12 col-md-3" style="background-color: white;">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mb-2 text-muted font-weight-bold">TOP CATEGORIES</div>
                    @foreach ($categories as $category)
                    <span class="d-block py-2"><a href="#">{{ $category->name }}</a></span>
                    @endforeach

                </div>
            </div>
        </div>

        {{-- Image carousel slider --}}
        <div class="col-12 col-md-6">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators custom_carousel_indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ $featured_female->productimages[0]['image'] }}" class="d-block w-100"
                            alt="Clothes hanging">
                        <div class="carousel_custom_caption_background carousel-caption d-none d-md-block">
                            <h4 class="font-weight-bold animated bounceInUp">Exclusive wearables</h5>
                                <p class="animated fadeInDownBig h5">Compatible with all genders in addition to quality.
                                </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ $featured_children->productimages[0]['image'] }}" class="d-block w-100" alt="...">
                        <div class="carousel_custom_caption_background carousel-caption d-none d-md-block">
                            <h4 class="font-weight-bold animated bounceInUp">Exceptional quality children wears</h5>
                                <p class="animated fadeInDownBig h5">Affordable children stocks with less price for
                                    quality.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ $featured_male->productimages[0]['image'] }}" class="d-block w-100" alt="...">
                        <div class="carousel_custom_caption_background carousel-caption d-none d-md-block">
                            <h4 class="font-weight-bold animated bounceInUp">Best qualities on sale 24/7</h5>
                                <p class="animated fadeInDownBig h5">Men wears offered in top qualities with assured
                                    satisfaction.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel_arrow"><span class="carousel-control-prev-icon"
                            aria-hidden="true"></span></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel_arrow"><span class="carousel-control-next-icon"
                            aria-hidden="true"></span></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        {{-- First side slider  --}}
        <div class="col-12 col-md-3">
            <div class="row">
                <div class="col-12">
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators custom_carousel_indicators custom_carousel_indicators_sm">
                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ $featured_female->productimages[0]['image'] }}" class="d-block w-100"
                                    alt="Clothes hanging">
                                <div class="carousel-caption d-none d-md-block" style="top: 10px;">
                                    <small class="font-weight-bold animated bounceInUp">Best prices given</small>
                                    <p class="animated fadeInDownBig h5">Quality for less price ranges</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ $featured_female->productimages[0]['image'] }}" class="d-block w-100"
                                    alt="...">
                                <div class="carousel-caption d-none d-md-block" style="top: 10px;">
                                    <small class="font-weight-bold animated bounceInUp">Beautiful dresses</small>
                                    <p class="animated fadeInDownBig h5">Look nice in our awesome outfits</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Second side carousel --}}
                <div class="col-12 mt-3">
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators custom_carousel_indicators custom_carousel_indicators_sm">
                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ $featured_wearable->productimages[0]['image'] }}" class="d-block w-100"
                                    alt="Clothes hanging">
                                <div class="carousel-caption d-none d-md-block" style="top: 10px;">
                                    <h5 class="font-weight-bold animated bounceInUp">Qualities wrist wears</h5>
                                    <p class="animated fadeInDownBig h5">A match for your special dress</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ $featured_wearable->productimages[0]['image'] }}" class="d-block w-100"
                                    alt="...">
                                <div class="carousel-caption d-none d-md-block" style="top: 10px;">
                                    <h5 class="font-weight-bold animated bounceInUp">Beautiful wearables</h5>
                                    <p class="animated fadeInDownBig h5">It takes the right combo to look good.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-lavender row mt-4 p-2">
        <div class="col-6 col-md-4 mt-3">
            <div class="text-center my-3">
                <img src="/images/send.svg" class="img-fluid" />
            </div>
            <div class="text-center h4">FREE SHIPPING</div>
            <div class="text-center h5">On all orders over 30,000</div>
        </div>
        <div class="col-6 col-md-4 mt-3">
            <div class="text-center my-3">
                <img src="/images/send.svg" class="img-fluid" />
            </div>
            <div class="text-center h4">FREE SHIPPING</div>
            <div class="text-center h5">On all orders over 30,000</div>
        </div>
        <div class="col-6 col-md-4 mx-auto mt-4">
            <div class="text-center my-3">
                <img src="/images/send.svg" class="img-fluid" />
            </div>
            <div class="text-center h4">FREE SHIPPING</div>
            <div class="text-center h5">On all orders over 30,000</div>
        </div>
        <div class="col-12 text-center mt-4 mt-md-5 mb-4"><span id="featured_category_header"
                class="h3 font-weight-bold">FEATURED CATEGORIES</span></div>

        <div class="col-12">
            <div class="row">
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <img src="{{ $featured_male->productimages[0]['image'] }}" height="360px" class="d-block w-100" />
                    <span class="h3 font-weight-bold text-white featured_category_title">MEN'S WEAR</span>
                </div>
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <img src="{{ $featured_female->productimages[0]['image'] }}" height="360px" class="d-block w-100" />
                    <span class="h3 font-weight-bold text-white featured_category_title">WOMEN'S WEAR</span>
                </div>
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <img src="{{ $featured_children->productimages[0]['image'] }}" height="360px"
                        class="d-block w-100" />
                    <span class="h3 font-weight-bold text-white featured_category_title">KID'S WEAR</span>
                </div>
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <img src="{{ $featured_wearable->productimages[0]['image'] }}" height="360px"
                        class="d-block w-100" />
                    <span class="h3 font-weight-bold text-white featured_category_title">WEARABLES</span>
                </div>
            </div>
        </div>

    </section>

    <section class="row">
        <div class="col-12 mt-4 mt-md-5 mb-2"><span class="category_header font-weight-bold h3">MEN</span></div>
        <div class="col-12 mb-1 text-right"><a href="#"><span class="font-weight-bold h6">SEE ALL</span></a></div>

        @foreach ($male_products as $male_product)
        <div class="col-12 col-md-3 my-2 single_product">
            <img src="{{ $male_product->productimages[0]['image'] }}" height="280px" class="d-block w-100" />
            <div class="add_to_cart text-center"><span class="font-weight-bold"
                    style="font-size: 24px;">{{ '₦'.$male_product->price }}</span><a
                    href="{{ "product/".$male_product->id }}"><span class="view_item">VIEW
                        ITEM</span></a></div>
        </div>
        @endforeach

    </section>

    <section class="row">
        <div class="col-12 mt-4 mt-md-5 mb-2"><span class="category_header font-weight-bold h3">WOMEN</span></div>
        <div class="col-12 mb-1 text-right"><a href="#"><span class="font-weight-bold h6">SEE ALL</span></a></div>

        @foreach ($female_products as $female_product)
        <div class="col-12 col-md-3 my-2 single_product">
            <img src="{{ $female_product->productimages[0]['image'] }}" height="280px" class="d-block w-100" />
            <div class="add_to_cart text-center"><span class="font-weight-bold"
                    style="font-size: 24px;">{{ '₦'.$female_product->price }}</span><a
                    href="{{ "product/".$female_product->id }}"><span class="view_item">VIEW
                        ITEM</span></a></div>
        </div>
        @endforeach

    </section>

    <section class="row">
        <div class="col-12 mt-4 mt-md-5 mb-2"><span class="category_header font-weight-bold h3">KIDS</span></div>
        <div class="col-12 mb-1 text-right"><a href="#"><span class="font-weight-bold h6">SEE ALL</span></a></div>

        @foreach ($children_products as $children_product)
        <div class="col-12 col-md-3 my-2 single_product">
            <img src="{{ $children_product->productimages[0]['image'] }}" height="280px" class="d-block w-100" />
            <div class="add_to_cart text-center"><span class="font-weight-bold"
                    style="font-size: 24px;">{{ '₦'.$children_product->price }}</span><a
                    href="{{ "product/".$children_product->id }}"><span class="view_item">VIEW
                        ITEM</span></a></div>
        </div>
        @endforeach

    </section>

    <section class="row">
        <div class="col-12 mt-4 mt-md-5 mb-2"><span class="category_header font-weight-bold h3">WEARABLES</span></div>
        <div class="col-12 mb-1 text-right"><a href="#"><span class="font-weight-bold h6">SEE ALL</span></a></div>

        @foreach ($wearables as $wearable)
        <div class="col-12 col-md-3 my-2 single_product">
            <img src="{{ $wearable->productimages[0]['image'] }}" height="280px" class="d-block w-100" />
            <div class="add_to_cart text-center"><span class="font-weight-bold"
                    style="font-size: 24px;">{{ '₦'.$wearable->price }}</span><a
                    href="{{ "product/".$wearable->id }}"><span class="view_item">VIEW
                        ITEM</span></a></div>
        </div>
        @endforeach

    </section>

    <section class="row">
        <div class="col-12 mt-4 mt-md-5 mb-2"><span class="category_header font-weight-bold h3">FOOT WEARS</span></div>
        <div class="col-12 mb-1 text-right"><a href="#"><span class="font-weight-bold h6">SEE ALL</span></a></div>

        @foreach ($foot_products as $foot_product)
        <div class="col-12 col-md-3 my-2 single_product">
            <img src="{{ $foot_product->productimages[0]['image'] }}" height="280px" class="d-block w-100" />
            <div class="add_to_cart text-center"><span class="font-weight-bold"
                    style="font-size: 24px;">{{ '₦'.$foot_product->price }}</span><a
                    href="{{ "product/".$foot_product->id }}"><span class="view_item">VIEW
                        ITEM</span></a></div>
        </div>
        @endforeach

    </section>

</div>
@endsection