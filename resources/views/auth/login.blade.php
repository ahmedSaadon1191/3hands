@extends('frontEnd.layouts.app')
@section('content')
<section class="section-padding" id="booking">
  <div class="container">
      <div class="row">
      
          <div class="col-lg-8 col-12 mx-auto">
              <div class="booking-form">
                  
                  <h2 class="text-center mb-lg-3 mb-2">Login To Your Account</h2>
              
                  <form role="form" action="{{ route('login') }}" method="post">
                      @csrf
                      <div class="row">

                          <div class="col-lg-6 col-12">
                              <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required>
                              @error('email')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="col-lg-6 col-12">
                              <input type="password" name="password" id="password" class="form-control" placeholder="password">
                              @error('password')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="col-lg-3 col-md-4 col-6 mx-auto">
                              <button type="submit" class="form-control" id="submit-button">Login Now</button>
                          </div>
                      </div>
                  </form>

              </div>
          </div>

      </div>
  </div>
</section>
@endsection