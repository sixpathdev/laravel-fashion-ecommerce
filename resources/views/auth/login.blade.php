@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center" style="margin-top: 80px;">
    <div class="col-12 col-md-5 my-3 my-md-5">
    <form id="login_form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1" class="text-muted">Email address</label>
          <input type="email" name="email" class="form-control py-4" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Email address">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1" class="text-muted">Password</label>
          <input type="password" name="password" class="form-control py-4" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" class="btn w-100 light_footer text-white font-weight-bold py-3">Log in</button>
      </form>
      <span class="d-block text-muted text-center mt-3">Do not have an account yet? <a href="/register"
          style="color: #cc0000;">Register</a></span>
    </div>
  </div>
</div>
@endsection