@extends('backEnd.layouts.app')
@section('title')
    Articales
@endsection
@section('page_name')
Articales
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
                        <a href="{{ route('articale.create') }}" class="btn btn-success" style="float: right">Create</a>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <tr>
                                        <th> ID </th>
                                        <th> Title </th>
                                        <th> Created By </th>
                                        <th> Category Name </th>
                                        <th> Controles </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $x = 1;
                                    @endphp
                                   @foreach ($articales as $articale)
                                       <tr>
                                           <td> $x++</td>
                                           <td> {{ $articale->title }}</td>
                                           <td> {{ $articale->admin->name }}</td>
                                           <td> {{ $articale->category->name }}</td>
                                           <td>
                                               <a href="{{ route('articale.edit',$articale->id ) }}" class="btn btn-primary">Edit</a>
                                               <a href="{{ route('articale.show',$articale->id ) }}" class="btn btn-info">Show</a>
                                               <form action="{{ route('articale.distroy',$articale->id) }}" method="post" style="display: inline">
                                                @csrf
                                                @method('Delete')
                                                <input type="submit" value="Delete" class="btn btn-danger">
                                            </form>
                                           </td>
                                       </tr>
                                   @endforeach
                                </tbody>
                                {{ $articales->links() }}
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
