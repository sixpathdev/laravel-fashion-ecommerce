@extends('layouts.app')

@section('content')

@if (Auth::user())
<div class="container" style="margin-top: 100px;">
    <div class="row mt-4">
        @include('includes.account_sidebar')
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                    <div class="h3 mb-4">Change Password</div>
                    @if (Session::has('update_success'))
                    <div class="alert alert-success text-center">{{ session('update_success') }}</div>
                    @endif
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                    @endif
                    <form method="POST" action="/account/changepassword">
                        @csrf
                        @method('PATCH')
                        <div class="form-group col-7 mb-5">
                            <input type="password" name="password" class="form-control customer_edit_form"
                                placeholder="New Password" />
                        </div>
                        <div class="form-group col-7 mb-5">
                            <input type="password" name="password_confirmation" class="form-control customer_edit_form"
                                placeholder="Confirm New Password" />
                        </div>
                        <div class="form-group col-7 mb-5">
                            <button type="submit" class="btn light_footer w-100 text-white">SUBMIT</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@else
@include('unauthorized')
@endif

@endsection