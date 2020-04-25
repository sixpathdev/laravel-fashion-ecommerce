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
                        <div class="col-6">
                            <div class="h4 ml-3 text-muted">Manage Categories</div>
                        </div>
                        <div class="col-6">
                            <button id="product_page_toggle"
                                class="btn light_footer text-white font-weight-bold border-none float-right"
                                onclick="showProductForm()">Add Category</button>
                        </div>
                    </div>

                    {{-- Display error if any --}}
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                    @endif

                    {{-- Category dashboard --}}
                    <div class="row mt-5" id="products_view">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-1 text-muted h5 text-center">ID</div>
                                <div class="col-5 text-muted h5 text-center">CATEGORY NAME</div>
                                <div class="col-3 text-muted h5 text-center">CREATED BY</div>
                                <div class="col-3 text-muted h5 text-center">OPTIONS</div>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="row">
                                @if (count($categories) < 1) <div class="col-12 text-muted text-center h5 my-5">You have
                                    no category yet</div>
                            @else
                            @foreach ($categories as $category)
                            <div class="col-1 text-center">{{ $category->id }}</div>
                            <div class="col-5 text-center">{{ $category->name }}</div>
                            <div class="col-3 text-center">{{ $category->createdby }}</div>
                            <div class="col-3">
                                <div class="row" style="position: relative; left: 35px;">
                                    <div class="col-4 text-center" style="position:relative; top: -8px;">
                                        <a href="/categories?id={{ $category->id }}">
                                            <span class="mx-2 px-1">
                                                <img class="img-fluid" src="/images/edit.svg" />
                                            </span>
                                        </a>
                                    </div>
                                    <div class="col-4" style="position:relative; top: -8px;">
                                        <form action="/categories/{{ $category->id }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-default mx-2 px-1">
                                                <img class="img-fluid" src="/images/trash.svg" />
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                @if (isset($_GET["id"]))
                <div class="modal" id="category-modal" style="display: block;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit category name</h5>
                                <button type="button" onclick="closeModal('category-modal')" class="close"
                                    data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="/categories/{{ isset($_GET['id']) ? $_GET['id'] : '' }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                        <label for="">Category name</label>
                                        <input type="text" name="categoryname" class="form-control"
                                            value="{{ $categories[$_GET['id']-1]->name ? $categories[$_GET['id']-1]->name : '' }}">
                                    </div>
                                    <button id="closeModal" onclick="closeModal('category-modal')"
                                        class="btn light_footer border-none text-white mr-3 px-4">Close</button>
                                    <button type="submit" class="btn light_footer border-none text-white">Save
                                        changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                {{-- Add category form --}}
                <div class="row mt-3" id="add_product_form" style="display: none;">
                    <div class="col-12 col-md-9 offset-md-1">
                        <form method="POST" action="{{ route('addCategory') }}">
                            @csrf
                            <div class="form-group">
                                <label for="productName" class="text-muted">Category name</label>
                                <input type="text" name="categoryname" class="form-control" id="productName"
                                    placeholder="Category name">
                            </div>
                            <button type="submit"
                                class="btn w-100 py-2 light_footer border-none text-white font-weight-bold">Add
                                Category</button>
                        </form>
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