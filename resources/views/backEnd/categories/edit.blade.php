@extends('backEnd.layouts.app')
@section('title')
   Update Category
@endsection
@section('page_name')
   Update New Category
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Update  Category</h4>
                <p class="card-category">Update  Category {{ $category->nmae }}</p>
              </div>
              <div class="card-body">
                <form action="{{ route('category.update',$category->id) }}" method="post">
                    @csrf
                    @method('PUT')
                  <div class="row">

                      {{-- NAME --}}
                    <div class="col-md-12">
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Category Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>                   
                  <button type="submit" class="btn btn-primary pull-right">Update Category</button>
                  <div class="clearfix"></div>
                </form>
              </div>
            </div>
          </div>
    </div>
@endsection