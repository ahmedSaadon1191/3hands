@extends('backEnd.layouts.app')
@section('title')
   Create Admin
@endsection
@section('page_name')
   Create New Admin
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
              {{-- STAER FLASH MESSAGES  --}}
              <div id="flash_message">
                @include('backEnd.layouts.alerts.success')
                @include('backEnd.layouts.alerts.errors')
           </div>
        {{-- END FLASH MESSAGES  --}}
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Create  Admin</h4>
                <p class="card-category">Create New Admin</p>
              </div>
              <div class="card-body">

                <div class="text-center">
                    <img src="{{ asset('backEnd/images/' . auth()->user()->logo) }}"
                    alt="" style="height: 50px; width:50px; margin:10px">
                </div>

                <form action="{{ route('admin.update',auth()->user()->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                  <div class="row">

                      {{-- NAME --}}
                    <div class="col-md-6">
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Admin Name</label>
                        <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                      {{-- EMAIL --}}
                    <div class="col-md-6">
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Admin Email</label>
                        <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                      {{-- PASSWORD --}}
                    <div class="col-md-6">
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Admin Password</label>
                        <input type="password" class="form-control" name="password">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                      {{-- CONFIRM PASSWORD --}}
                    <div class="col-md-6">
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation">
                        @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="col-lg-12 col-12">
                        <input type="file" name="logo" class="form-control">
                        
                    </div>
                   
                  <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                  <div class="clearfix"></div>
                </form>
              </div>
            </div>
          </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function()
        {
            $('#flash_message').show().fadeOut(2500);
        });
    </script>
@endsection