@extends('layouts.app')

@section('content')

@if (Auth::user())
<div class="container" style="margin-top: 100px;">
    <div class="row">
        @include('includes.account_sidebar')
        <div class="col-9">
            <div class="card">
                <div class="card-body">
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
                        </div>
                        <div class="col-6">
                            <div class="h4 ml-3 text-muted">Manage Products</div>
                        </div>
                        <div class="col-6">
                            <button id="product_page_toggle"
                                class="btn light_footer text-white font-weight-bold border-none float-right"
                                onclick="showProductForm()">Add Product</button>
                        </div>
                    </div>

                    {{-- Display error if any --}}
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                    @endif

                    {{-- Products dashboard --}}
                    <div class="row mt-5" id="products_view">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 text-muted h5">PRODUCT NAME</div>
                                <div class="col-3 text-muted h5">PRODUCT PRICE</div>
                                <div class="col-3 text-muted h5">CATEGORY</div>
                                <div class="col-2 text-muted h5">OPTIONS</div>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="row">
                                @if (count($products) < 1) <div class="col-12 text-muted text-center h5 my-5">You have
                                    no product available</div>
                            @else
                            @foreach ($products as $product)
                            <div class="col-4">{{ $product->name }}</div>
                            <div class="col-3">{{ $product->price .'.00' }}</div>
                            <div class="col-3">{{ $product->category }}</div>
                            <div class="col-1" style="position:relative; top: -8px;">
                                <a href="/products?id={{ $product->id }}">
                                    <span class="mx-2 px-1">
                                        <img class="img-fluid" src="/images/edit.svg" />
                                    </span>
                                </a>
                            </div>
                            <div class="col-1" style="position:relative; top: -8px;">
                                <form action="/products/{{ $product->id }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-default mx-2 px-1">
                                        <img class="img-fluid" src="/images/trash.svg" />
                                    </button>
                                </form>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Add product form --}}
                <div class="row mt-3" id="add_product_form" style="display: none;">
                    <div class="col-12 col-md-9 offset-md-1">
                        <form method="POST" action="{{ route('product') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="productName" class="text-muted">Product name</label>
                                <input type="text" name="productName" class="form-control" id="productName"
                                    placeholder="Product name">
                            </div>
                            <div class="form-group">
                                <label for="productDescription">Product description</label>
                                <textarea class="form-control" name="productDescription" id="" cols="30"
                                    rows="8"></textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="category">product category</label>
                                    <select class="form-control" name="productCategory" id="category">
                                        <option selected>Choose...</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for=" size">Product size</label>
                                    <select class="form-control" name="productSize" id="category">
                                        <option selected>Choose...</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="S">S</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="price">Product price</label>
                                    <input type="text" name="productPrice" class="form-control" id="price"
                                        placeholder="e.g 30000">
                                </div>
                            </div>
                            <div class="custom-file mb-2">
                                <label class="custom-file-label" for="productImage">Choose main
                                    product image</label>
                                <input type="file" name="productImages[]" class="custom-file-input" id="productImage"
                                    multiple>
                            </div>
                            <div class="custom-file mb-2">
                                <input type="file" name="alt_image1" class="custom-file-input" id="productImage">
                                <label class="custom-file-label" for="productImage">Alt product
                                    image 1</label>
                            </div>
                            <div class="custom-file mb-2">
                                <input type="file" name="alt_image2" class="custom-file-input" id="productImage">
                                <label class="custom-file-label" for="productImage">Alt product
                                    image 2</label>
                            </div>
                            <div class="custom-file mb-3">
                                <input type="file" name="alt_image3" class="custom-file-input" id="productImage">
                                <label class="custom-file-label" for="productImage">Alt product
                                    image 3</label>
                            </div>
                            <button type="submit"
                                class="btn w-100 py-2 light_footer border-none text-white font-weight-bold">Add
                                Product</button>
                        </form>
                    </div>
                </div>

                {{-- Edit product form --}}
                @if (isset($_GET["id"]))
                <div class="modal" id="product-modal" style="display: block;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit product name</h5>
                                <button type="button" onclick="closeModal('product-modal')" class="close"
                                    data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="/product/{{ isset($_GET['id']) ? $_GET['id'] : '' }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                        <label for="">Product name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $products[$_GET['id']-1]->name ? $products[$_GET['id']-1]->name : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Product description</label>
                                        <textarea name="description"
                                            class="form-control">{{ $products[$_GET['id']-1]->description ? $products[$_GET['id']-1]->description : '' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Product category</label>
                                        <select class="form-control" name="category" id="category">
                                            <option selected>Choose...</option>
                                            @foreach ($products as $product)
                                            <option value="{{ $product->category }}">{{ $product->category }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for=" size">Product size</label>
                                        <select class="form-control" name="size" id="category">
                                            <option selected>Choose...</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="S">S</option>
                                            <option value="XL">XL</option>
                                            <option value="XXL">XXL</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Product price</label>
                                        <input type="text" name="price" class="form-control"
                                            value="{{ $products[$_GET['id']-1]->price ? $products[$_GET['id']-1]->price : '' }}">
                                    </div>
                                    <button id="closeModal" onclick="closeModal('product-modal')"
                                        class="btn light_footer border-none text-white mr-3 px-4">Close</button>
                                    <button type="submit" class="btn light_footer border-none text-white">Save
                                        changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
</div>
@else
@include('unauthorized')
@endif

@endsection