@extends('backEnd.layouts.app')
@section('title')
    Show Articale
@endsection
@section('css')
    <link href="{{ asset('backEnd/assets/demo/demo.css') }}" rel="stylesheet" />
    <style>
        *::placeholder {
            /* modern browser */
            color: #fff !important;
        }

    </style>
@endsection
@section('page_name')
    Show Articale {{ $articale->title }}
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Material Dashboard Heading</h4>
                    <p class="card-category">Showd using Roboto Font Family</p>
                </div>

                 {{-- STAER FLASH MESSAGES  --}}
                 <div id="flash_message">
                    @include('backEnd.layouts.alerts.success')
                    @include('backEnd.layouts.alerts.errors')
               </div>
            {{-- END FLASH MESSAGES  --}}

                <div class="card-body">
                    <div id="typography">
                        <div class="card-title">
                            <h2>{{ $articale->title }}</h2>
                        </div>
                        <div class="row">
                            <div class="tim-typo">
                                <h3>
                                    <span class="tim-note"> Created By</span>{{ $articale->admin->name }}
                                </h3>
                            </div>

                            <div class="tim-typo">
                                <h3>
                                    <span class="tim-note"> Category Name</span>{{ $articale->category->name }}
                                </h3>
                            </div>

                            <div class="tim-typo">
                                <h4>
                                    <span class="tim-note">Content</span>{{ $articale->content }}
                                </h4>
                            </div>

                            {{-- COMMENTS --}}

                            <div style="margin: auto">
                                <h2 class="text-center" style="color: #a7a7a7"> COMMENTS</h2>
                                <br>
                            </div>

                            <div class="container" id="show_comment">

                                {{-- CREATE COMMENT --}}
                                <a href="" class="btn btn-success btn-round" id="create_comment_btn">CREATE New Comment</a>

                                <form id="creaete_comment_form" style="display: none">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-sm-9">
                                            <input type="text" name="articale_id" value="{{ $articale->id }}"
                                                style="display: none">
                                        </div>
                                        <div class="form-group col-sm-9">
                                            <input type="text" name="comment" class="form-control"
                                                placeholder="Create Comment" id="create_comment_form_input">
                                            <span class="text-danger" id="comment_error"></span>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <input type="submit" class="form-control btn btn-primary btn-round"
                                                id="create_comment_form_btn">
                                        </div>
                                    </div>
                                </form>

                                {{-- START COMMENTS --}}
                                @if ($comments && $comments->count() > 0)
                                    @foreach ($comments as $comment)

                            {{-- SHOW COMMENTS OF ADMINS  --}}
                                        @if (isset($comment->admin->name))
                                            <div class="card border border-info" >
                                                
                                                <div class="tim-typo pt-5">
                                                    <h4>
                                                        <span class="tim-note">
                                                            {{ $comment->admin->name }}
                                                            <img src="{{ asset('backEnd/images/' . $comment->admin->logo) }}"
                                                                alt="" style="height: 50px; width:50px; margin:10px">
                                                        </span>

                                                       {{$comment->comment}}
                                                    </h4>
                                                </div>

                                                {{-- EDIT COMMENT --}}
                                                <div class="card-footer" id="replay_btn{{ $comment->id }}">
                                                    @if ($comment->admin->id == auth()->user()->id)
                                                        <a class="btn btn-primary btn-round create_replay_btn" coomentId="{{ $comment->id }}">Update</a>     
                                                    @endif
                                                    <a href="{{ route('comment.distroy',$comment->id) }}" class="btn btn-danger btn-round ">Delete</a>
                                                    <p style="color: #7a7a7a">Created At <br>{{ $comment->created_at }}</p>
                                                </div>

                                                <div class="card-body " style="display: none" id="creaete_replay_form{{ $comment->id }}">

                                {{-- EDIT COMMENT FORM  --}}
                                                    <form class="p-1" method="post" action="{{ route('comment.update',$comment->id) }}">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="row">
                                                            <div class="form-group col-sm-8">
                                                                <input type="text" name="comment" placeholder="comment"
                                                                    class="form-control text-center"
                                                                    style="color: #fff; height: 20px;"
                                                                    id="create_replay_form_input" value="{{ $comment->comment }}">
                                                            </div>
                                                            <div class="form-group col-sm-8">
                                                                <input type="text" name="comment_id" value="{{ $comment->id }}" style="display: none">
                                                            </div>
                                                            <div class="form-group col-sm-8">
                                                                <input type="text" name="articale_id" value="{{ $articale->id }}" style="display: none">
                                                            </div>

                                                            <div class="form-group col-sm-2 btn btn-round"
                                                                style="background-color: #913f9e; padding:auto">
                                                                <input type="submit" value="SUBMIT"
                                                                    class="form-control text-center create_edit_form_btn"
                                                                    style="color: #fff; height: 20px;" commentId="{{ $comment->id }}">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                               
                                        @else

                                {{-- SHOW COMMENTS OF USERS --}}
                                            <div class="card border border-info">
                                                <div class="tim-typo pt-5">
                                                    <h4>
                                                        <span class="tim-note">
                                                            {{ $comment->user->name }}
                                                            <img src="{{ asset('backEnd/images/' . $comment->user->logo) }}"
                                                                alt="" style="height: 50px; width:50px; margin:10px">
                                                        </span>

                                                       {{$comment->comment}}
                                                    </h4>
                                                </div>

                                                {{-- REPLAY --}}

                                                <div class="card-footer" style="display: none" id="replay_btn">
                                                    <a href="#pablo" class="btn btn-primary btn-round create_replay_btn" coomentId="{{ $comment->id }}">Replay</a>
                                                    <p style="color: #7a7a7a">Created At <br> {{ $comment->create_at }}</p>
                                                </div>

                                                <div class="card-body " style="display: none" id="creaete_replay_form{{ $comment->id }}">
                                                    <form class="p-1 ">
                                                        <div class="row">
                                                            <div class="form-group col-sm-8">
                                                                <input type="text" name="replay" placeholder="Replay"
                                                                    class="form-control text-center"
                                                                    style="color: #fff; height: 20px;"
                                                                    id="create_replay_form_input">
                                                                <span class="text-danger" id="replay_error"></span>

                                                            </div>
                                                            <div class="form-group col-sm-2 btn btn-round"
                                                                style="background-color: #913f9e; padding:auto">
                                                                <input type="submit" value="SUBMIT"
                                                                    class="form-control text-center"
                                                                    style="color: #fff; height: 20px;"
                                                                    id="create_replay_form_btn">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        @endif

                                    @endforeach
                                    {{-- {{ $comments->links() }} --}}
                                @endif
                                {{-- END COMMENTS --}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('js')
    {{-- SHOW BUTTONS  --}}
        <script>
            $(document).ready(function() {
                // CREATE NEW COMMENT 
                $('#create_comment_btn').on('click', function(e) {
                    e.preventDefault();

                    $('#creaete_comment_form').show();
                });

            });


            $(document).on('click', '.create_replay_btn', function(e) 
            {
                e.preventDefault();
                    var coomentId = $(this).attr('coomentId');
                $('#creaete_replay_form' + coomentId).show();
            });
        </script>


{{-- CREATE NEW COMMENT  --}}
        <script>

             $(document).ready(function() 
             {
                $(document).on('click', '#create_comment_form_btn', function(e) 
                {
                    e.preventDefault();

                    // DELETE ERROR MESSAGE IF INPUT HAVE VALUE WITHOUT REFRESH PAGE
                    $('#comment_error').text('');


                    //Get Form Data
                    var query = new FormData($('#creaete_comment_form')[0]);
                    fetch_customer_data(query);

                    function fetch_customer_data(query = '') 
                    {

                        $.ajax({
                            type: 'post',
                            url: "{{ route('comment.store') }}",
                            data: query,
                            processData: false,
                            dataType: 'json',
                            contentType: false,
                            cache: false,
                            success: function(data) 
                            {
                                
                                alert("yes");
                                var oldData = $('#show_comment').html();
                                $('#show_comment').show().html(oldData + data.table_data);

                            },

                        })
                    }
                });
            });

        </script>


{{-- FADE OUT FLASH MESSAGES --}}
  <script>
        $(document).ready(function()
        {
            $('#flash_message').show().fadeOut(2500);
        });
    </script>
    @endsection


   
