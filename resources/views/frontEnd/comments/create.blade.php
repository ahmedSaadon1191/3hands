@extends('frontEnd.layouts.app')

@section('content')
<section class="section-padding" id="booking">
  <div class="container">
      <div class="row">
      
          <div class="col-lg-8 col-12 mx-auto">
              <div class="booking-form">
                  
                  <h2 class="text-center mb-lg-3 mb-2">Create New Comment For Aricale {{ $articale->title }}</h2>
              
                  <form role="form" action="{{ route('user.comment.store') }}" method="post">
                      @csrf
                      <div class="row">

                          <div class="col-lg-12 col-12">
                              <input type="text" name="articale_id" value="{{ $articale->id }}" style="display: none">
                            
                          </div>
                          <div class="col-lg-12 col-12">
                              <input type="text" name="comment" id="comment"  class="form-control" placeholder="Your Comment" required>
                              @error('comment')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="col-lg-3 col-md-4 col-6 mx-auto">
                              <button type="submit" class="form-control" id="submit-button">Create Comment</button>
                          </div>
                      </div>
                  </form>

              </div>
          </div>

      </div>
  </div>
</section>
@endsection










