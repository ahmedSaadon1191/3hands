@extends('backEnd.layouts.app')
@section('title')
    Admins
@endsection
@section('page_name')
    Admins
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
                        <a href="{{ route('admin.create') }}" class="btn btn-success" style="float: right">Create</a>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <tr>
                                        <th> ID </th>
                                        <th> Name </th>
                                        <th> Email </th>
                                        <th> Logo </th>
                                        <th> Controles </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $x = 1;
                                    @endphp
                                   @foreach ($admins as $admin)
                                       <tr>
                                           <td> {{ $x++ }}</td>
                                           <td> {{ $admin->name }}</td>
                                           <td> {{ $admin->email }}</td>
                                           <td> <img src="{{ asset('backEnd/images/'.$admin->logo) }}" alt="" style="height: 50px; width:50px; margin:10px"></td>
                                           <td>
                                               <a href="{{ route('admin.edit',$admin->id ) }}" class="btn btn-primary">Edit</a>
                                               <form action="{{ route('admin.distroy',$admin->id) }}" method="post" style="display: inline">
                                                @csrf
                                                @method('Delete')
                                                <input type="submit" value="Delete" class="btn btn-danger">
                                            </form>
                                           </td>
                                       </tr>
                                   @endforeach
                                </tbody>
                                {{ $admins->links() }}
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
