@extends('frontEnd.layouts.app')

@section('content')
<section class="section-padding" id="booking">
  <div class="container">
      <div class="row">
      
          <div class="col-lg-8 col-12 mx-auto">
              <div class="booking-form">
                  
                  <h2 class="text-center mb-lg-3 mb-2">Update Comment </h2>
              
                  <form role="form" action="{{ route('user.comment.update',$comment->id) }}" method="post">
                      @csrf
                      <div class="row">

                          <div class="col-lg-12 col-12">
                              <input type="text" name="comment_id" value="{{ $comment->id }}" style="display: none">
                            
                          </div>
                          <div class="col-lg-12 col-12">
                              <input type="text" name="comment" id="comment"  class="form-control" placeholder="Your Comment" value="{{ $comment->comment }}" required>
                              @error('comment')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="col-lg-3 col-md-4 col-6 mx-auto">
                              <button type="submit" class="form-control" id="submit-button">Update Comment</button>
                          </div>
                      </div>
                  </form>

              </div>
          </div>

      </div>
  </div>
</section>
@endsection










