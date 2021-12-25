@extends('frontEnd.layouts.app')
@section('content')

{{-- STAER FLASH MESSAGES  --}}
<div id="flash_message">
    @include('backEnd.layouts.alerts.success')
    @include('backEnd.layouts.alerts.errors')
</div>
{{-- END FLASH MESSAGES  --}}

<section class="section-padding pb-0" id="reviews">
    <div class="container">
        <div class="row">
           

                <h2 class="text-center mb-lg-5 mb-4">Comments Of {{ $articale->title }}</h2>
               @if (isset($articale->comments))
                   @foreach ($articale->comments as $comment)
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <p class="text-primary d-block mt-2 mb-0 w-100">Created At : <strong>{{ $comment->created_at }}</strong></p>
                            </div>
            
                            <div class="card-body" style="background-color: #000; color:#fff">
                                <p class="reviews-text w-100">{{ $comment->comment }}</p>
                            </div>

                            
                            
            
                            <div class="card-footer">

                                @if (isset($comment->admin->id))
                                    <img src="{{ asset('backEnd/images/' . $comment->admin->logo) }}" class="img-fluid reviews-image" alt="">
                
                                    <figcaption class="ms-4">
                                        <strong>Created By : </strong>
                                        <span class="text-muted">{{ $comment->admin->name }}</span>
                                    </figcaption>
                                    @if ($comment->admin->id == auth()->user()->id)
                                    <figcaption class="ms-4" style="float: right">
                                        <a href="{{ route('user.comment.edit',$comment->id) }}" class="btn btn-primary btn-sm"> Update</a>
                                        <a href="{{ route('user.comment.delete',$comment->id) }}" class="btn btn-danger btn-sm"> Delete</a>
                                    </figcaption>
                                @endif
                                @else
                                    <img src="{{ asset('backEnd/images/' . $comment->user->logo) }}" class="img-fluid reviews-image" alt="">
                    
                                    <figcaption class="ms-4">
                                        <strong>Created By : </strong>
                                        <span class="text-muted">{{ $comment->user->name }}</span>
                                    </figcaption>
                                    @if ($comment->user->id == auth()->user()->id)
                                        <figcaption class="ms-4" style="float: right">
                                            <a href="{{ route('user.comment.edit',$comment->id) }}" class="btn btn-primary btn-sm"> Update</a>
                                            <a href="{{ route('user.comment.delete',$comment->id) }}" class="btn btn-danger btn-sm"> Delete</a>
                                        </figcaption>
                                    @endif
                                @endif
            
                            </div>
                        </div>
                    </div>
                   @endforeach
               @else
                   <h1 class="tect-center">No Comments Now</h1>
               @endif
               
               
                

        </div>
    </div>
</section>
    
@endsection
@section('js')
    <script>
        $(document).ready(function()
        {
            $('#flash_message').show().fadeOut(3000);
        });
    </script>
@endsection