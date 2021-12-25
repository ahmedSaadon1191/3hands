@extends('backEnd.layouts.app')
@section('title')
   Create Articale
@endsection
@section('page_name')
   Create New Articale
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Create  Articale</h4>
                <p class="card-category">Create New Articale</p>
              </div>
              <div class="card-body">
                <form action="{{ route('articale.store') }}" method="post">
                    @csrf
                  <div class="row">

                      {{-- CATEGORY ID --}}
                    <div class="col-md-6">
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Articale Category</label>
                        <select name="category_id" class="form-control">
                            <option value=""> Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>   

                      {{-- TITLE --}}
                    <div class="col-md-6">
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Articale Title</label>
                        <input type="text" class="form-control" name="title">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>            

                      {{-- CONTENT --}}
                    <div class="col-md-12">
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Articale Content</label>
                        <textarea name="content" id="" cols="160" rows="10"></textarea>
                        @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>                   
                  <button type="submit" class="btn btn-primary pull-right">Create Articale</button>
                  <div class="clearfix"></div>
                </form>
              </div>
            </div>
          </div>
    </div>
@endsection