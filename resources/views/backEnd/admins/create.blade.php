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
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Create  Admin</h4>
                <p class="card-category">Create New Admin</p>
              </div>
              <div class="card-body">
                <form action="{{ route('admin.store') }}" method="post">
                    @csrf
                  <div class="row">

                      {{-- NAME --}}
                    <div class="col-md-6">
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Admin Name</label>
                        <input type="text" class="form-control" name="name">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                      {{-- EMAIL --}}
                    <div class="col-md-6">
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Admin Email</label>
                        <input type="email" class="form-control" name="email">
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
                   
                  <button type="submit" class="btn btn-primary pull-right">Create Admin</button>
                  <div class="clearfix"></div>
                </form>
              </div>
            </div>
          </div>
    </div>
@endsection