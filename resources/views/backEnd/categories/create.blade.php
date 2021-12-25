@extends('backEnd.layouts.app')
@section('title')
   Create Category
@endsection
@section('page_name')
   Create New Category
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Create  Category</h4>
                <p class="card-category">Create New Category</p>
              </div>
              <div class="card-body">
                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                  <div class="row">

                      {{-- NAME --}}
                    <div class="col-md-12">
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Category Name</label>
                        <input type="text" class="form-control" name="name">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>                   
                  <button type="submit" class="btn btn-primary pull-right">Create Category</button>
                  <div class="clearfix"></div>
                </form>
              </div>
            </div>
          </div>
    </div>
@endsection