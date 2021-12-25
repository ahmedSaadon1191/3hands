@extends('backEnd.layouts.app')
@section('title')
    Categories
@endsection
@section('page_name')
Categories
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Simple Table</h4>
                        <p class="card-category"> Here is a subtitle for this table</p>
                    </div>
                    <div class="card-body">
                        {{-- STAER FLASH MESSAGES  --}}
                           <div id="flash_message">
                                @include('backEnd.layouts.alerts.success')
                                @include('backEnd.layouts.alerts.errors')
                           </div>
                        {{-- END FLASH MESSAGES  --}}
                        <a href="{{ route('category.create') }}" class="btn btn-success" style="float: right">Create</a>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <tr>
                                        <th> ID </th>
                                        <th> Name </th>
                                        <th> Created By </th>
                                        <th> Controles </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $x = 1;
                                    @endphp
                                   @foreach ($categories as $category)
                                       <tr>
                                           <td> {{ $x++ }}</td>
                                           <td> {{ $category->name }}</td>
                                           <td> {{ $category->admin->name }}</td>
                                           <td>
                                               <a href="{{ route('category.edit',$category->id ) }}" class="btn btn-primary">Edit</a>
                                               <form action="{{ route('category.distroy',$category->id) }}" method="post" style="display: inline">
                                                @csrf
                                                @method('Delete')
                                                <input type="submit" value="Delete" class="btn btn-danger">
                                            </form>
                                           </td>
                                       </tr>
                                   @endforeach
                                </tbody>
                                {{ $categories->links() }}
                            </table>
                        </div>
                    </div>
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
