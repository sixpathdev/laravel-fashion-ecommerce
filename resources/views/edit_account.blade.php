@extends('layouts.app')

@section('content')

@if (Auth::user())
<div class="container" style="margin-top: 100px;">
  <div class="row mt-4">
    @include('includes.account_sidebar')
    <div class="col-9">
      <div class="card">
        <div class="card-body">
          <div class="h3 mb-4">Details</div>
          @if (Session::has('update_success'))
          <div class="alert alert-success text-center">User details updated successfully</div>
          @endif
          @if ($errors->any())
          @foreach ($errors->all() as $error)
          <div class="alert alert-danger">{{ $error }}</div>
          @endforeach
          @endif
          <form method="POST" action="/account/update">
            @csrf
            @method('PUT')
            <div class="form-row my-2">
              <div class="col">
                <input type="text" name="first_name" value="{{ $user[0]->first_name }}"
                  class="form-control customer_edit_form" placeholder="First name">
              </div>
              <div class="col">
                <input type="text" name="last_name" value="{{ $user[0]->last_name }}"
                  class="form-control customer_edit_form" placeholder="Last name">
              </div>
            </div>
            <div class="form-row mt-5">
              <div class="col">
                <input type="email" value="{{ $user[0]->email }}" class="form-control customer_edit_form"
                  placeholder="E-mail" disabled>
                  <input type="hidden" name="email" value="{{ $user[0]->email }}" class="form-control customer_edit_form"
                  placeholder="E-mail">
              </div>
              <div class="col">
                <input type="tel" name="phone" value="{{ $user[0]->phone }}" class="form-control customer_edit_form"
                  placeholder="Phone">
              </div>
            </div>
            <div class="form-row mt-5 mb-5">
              <div class="col">
                <div class="col">
                  <input type="text" name="gender" value="{{ ucwords($user[0]->gender) }}"
                    class="form-control customer_edit_form" placeholder="Phone">
                </div>
              </div>
              <div class="col">
                <input type="date" name="dob" class="form-control customer_edit_form" value="{{ $user[0]->dob }}">
              </div>
            </div>
            <input type="hidden" name="password" value="{{ ucwords($user[0]->password) }}">
            <button type="submit" class="btn light_footer w-100 text-white">SUBMIT</button>
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