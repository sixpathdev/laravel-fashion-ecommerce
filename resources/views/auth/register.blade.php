@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 100px;">
  <div class="row justify-content-center">
    <div class="col-12 col-md-5">
      @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
      @endif
      <form id="register_form" method="POST" action="{{ route('register') }}">
        @csrf
          <div class="form-row mb-3">
            <div class="col">
              <label for="first_name" class="text-muted">First Name</label>
              <input type="text" name="first_name" class="form-control py-4" placeholder="First name">
            </div>
            <div class="col">
              <label for="last_name" class="text-muted">Last Name</label>
              <input type="text" name="last_name" class="form-control py-4" placeholder="Last name">
            </div>
          </div>
        <div class="form-group">
          <label for="exampleInputEmail1" class="text-muted">Email address</label>
          <input type="email" name="email" class="form-control py-4" id="exampleInputEmail1"
            aria-describedby="emailHelp" placeholder="Email address">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputNumber" class="text-muted">Phone Number</label>
          <input type="tel" name="phone" class="form-control py-4" id="exampleInputNumber" aria-describedby="phoneHelp"
            placeholder="Phone Number">
        </div>
        <div class="form-row mb-3">
          <div class="col">
            <label for="dob" class="text-muted">Date of birth</label>
            <input type="date" name="dob" class="form-control py-4" id="dob">
          </div>
          <div class="col">
            <label for="last_name" class="text-muted">Gender</label>
            <select class="custom-select custom-select-lg" name="gender" style="height: calc(1.5em + 1.4rem + 2px);">
              <option selected>Choose Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1" class="text-muted">Password</label>
          <input type="password" name="password" class="form-control py-4" id="exampleInputPassword1"
            placeholder="Password">
        </div>
        <button type="submit" class="btn w-100 light_footer font-weight-bold text-white py-3"
          style="letter-spacing: 1.1px;">Register</button>
      </form>
    </div>
  </div>
</div>
@endsection