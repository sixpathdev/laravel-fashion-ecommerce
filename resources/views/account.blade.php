@extends('layouts.app')

@section('content')

@if (Auth::user())
<div class="container" style="margin-top: 100px;">
    <div class="row mt-4">
        @include('includes.account_sidebar')
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                    <div class="h3">Account Overview</div>
                    @if (Session::has('update_success'))
                    <div class="alert alert-success text-center">{{ session('update_success') }}</div>
                    @endif
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                    @endif
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header card-header-custom">
                                    <span>ACCOUNT DETAILS</span>
                                    <a href="#">
                                        <span class="float-right" style="position: relative; top: -6px;">
                                            <svg version="1.1" width="20px" height="20px" fill="#af0000" id="Capa_1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 383.947 383.947"
                                                style="enable-background:new 0 0 383.947 383.947;" xml:space="preserve">
                                                <g>
                                                    <g>
                                                        <g>
                                                            <polygon
                                                                points="0,303.947 0,383.947 80,383.947 316.053,147.893 236.053,67.893 			" />
                                                            <path d="M377.707,56.053L327.893,6.24c-8.32-8.32-21.867-8.32-30.187,0l-39.04,39.04l80,80l39.04-39.04
                    C386.027,77.92,386.027,64.373,377.707,56.053z" />
                                                        </g>
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
                                        </span>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="h5 pb-2 text-dark font-weight-bold">
                                        {{ Auth::user()->first_name.' '.Auth::user()->last_name }}</div>
                                    <div class="mb-3 font-weight-bold text-muted"
                                        style="letter-spacing: 1.3px;text-transform: uppercase;">
                                        {{ Auth::user()->email }}</div>
                                    <span class="py-2 pr-2 change_password"><a class="pl-1" href="#"
                                            style="color: #d0011b;">CHANGE
                                            PASSWORD</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header card-header-custom">
                                    <span>SHIPPING ADDRESS</span>
                                    <a href="/account/customer/address">
                                        <span class="float-right" style="position: relative; top: -6px;">
                                            <svg version="1.1" width="20px" height="20px" fill="#af0000" id="Capa_1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 383.947 383.947"
                                                style="enable-background:new 0 0 383.947 383.947;" xml:space="preserve">
                                                <g>
                                                    <g>
                                                        <g>
                                                            <polygon
                                                                points="0,303.947 0,383.947 80,383.947 316.053,147.893 236.053,67.893 			" />
                                                            <path d="M377.707,56.053L327.893,6.24c-8.32-8.32-21.867-8.32-30.187,0l-39.04,39.04l80,80l39.04-39.04
                    C386.027,77.92,386.027,64.373,377.707,56.053z" />
                                                        </g>
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
                                        </span>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <span class="d-block h5">Shipping address:</span>
                                    <span
                                        class="d-block text-muted mb-1">{{ Auth::user()->address ? Auth::user()->address : 'No shipping address available.' }}</span>
                                    <span
                                        class="d-block text-muted mb-0">{{ Auth::user()->city ? Auth::user()->city : '' }}</span>
                                    <span
                                        class="d-block text-muted mb-0">{{ Auth::user()->state ? Auth::user()->state : '' }}</span>
                                    {{-- <span class="py-2 pr-2 change_password"><a class="pl-1" href="#"
                                            style="color: #d0011b;">ADD DEFAULT ADDRESS</a></span> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mt-4">
                            <div class="card">
                                <div class="card-header card-header-custom">
                                    <span>NEWSLETTER PREFERENCES</span>
                                </div>
                                <div class="card-body">
                                    <span class="d-block h5">You are currently not subscribed to any of our
                                        newsletters.</span>
                                    <span class="d-block text-muted mb-3">No default shipping address available.</span>
                                    <span class="py-2 pr-2 change_password"><a class="pl-1" href="#"
                                            style="color: #d0011b;">EDIT NEWSLETTER PREFERENCES</a></span>
                                </div>
                            </div>
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