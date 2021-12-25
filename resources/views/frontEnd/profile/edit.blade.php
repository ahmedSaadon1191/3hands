@extends('frontEnd.layouts.app')
@section('content')

<section class="section-padding" id="about">
    <div class="container">
        <div class="row">

            <div class="booking-form">

                 {{-- STAER FLASH MESSAGES  --}}
                 <div id="flash_message">
                    @include('backEnd.layouts.alerts.success')
                    @include('backEnd.layouts.alerts.errors')
               </div>
            {{-- END FLASH MESSAGES  --}}
                    
                <h2 class="text-center mb-lg-3 mb-2">Create New User</h2>

                <div class="text-center">
                    <img src="{{ asset('backEnd/images/' . auth()->user()->logo) }}"
                    alt="" style="height: 50px; width:50px; margin:10px">
                </div>
            
                <form role="form" action="{{ route('user.profile.update',auth()->user()->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <input type="text" name="name" id="name" class="form-control" placeholder=" name" required value="{{auth()->user()->name  }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6 col-12">
                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required value="{{ auth()->user()->email }}">
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

                        <div class="col-lg-6 col-12">
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="password_confirmation" class="form-control">
                            
                        </div>

                        <div class="col-lg-12 col-12">
                            <input type="file" name="logo" class="form-control">
                            
                        </div>

                        <div class="col-lg-3 col-md-4 col-6 mx-auto">
                            <button type="submit" class="form-control" id="submit-button">Update Profile</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</section>
@endsection
@section('js')
    <script>
        $(document).ready(function()
        {
            $('#flash_message').show().fadeOut(2500);
        });
    </script>
@endsection