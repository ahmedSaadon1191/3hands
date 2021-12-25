@extends('frontEnd.layouts.app')
@section('content')

{{-- STAER FLASH MESSAGES  --}}
<div id="flash_message">
    @include('backEnd.layouts.alerts.success')
    @include('backEnd.layouts.alerts.errors')
</div>
{{-- END FLASH MESSAGES  --}}

<section class="section-padding pb-0" id="timeline">
    <div class="container">
        <div class="row">
            {{-- START SEARCH INPUT  --}}
                <div class="form-group">
                    <select name="search" id="search" class="form-control" style="width: 30%">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            {{-- END SEARCH INPUT  --}}

            <h2 class="text-center mb-lg-5 mb-4">Our Articales</h2>

        {{-- START ALL ARTICALES --}}
            <div class="timeline" id="articales1">
                @foreach ($articales as $articale)
                    <div class="row g-0 justify-content-end justify-content-md-around align-items-start timeline-nodes">



                        <div class="col-9 col-md-5 me-md-4 me-lg-0 order-3 order-md-1 timeline-content bg-white shadow-lg">
                            <h3 class=" text-light">{{ $articale->title }}</h3>
                            <p> {{ $articale->content }}</p>
                            <div class="padding p-5" style="float: left">
                                <a href="{{ route('user.comment.create',$articale->id) }}" class="btn btn-success">Create Comment</a>
                                <a href="{{ route('user.comment.show',$articale->id) }}" class="btn btn-info">Show More</a>
                            </div>

                            <div class="padding2 p-5">
                                <strong style="float: right">{{ $articale->comments->count() }} <strong>Comments</strong></strong>
                                
                            </div>
                        </div>

                        <div class="col-3 col-sm-1 order-2 timeline-icons text-md-center">
                            <i class="bi-patch-check-fill timeline-icon"></i>
                        </div>

                        <div class="col-9 col-md-5 ps-md-3 ps-lg-0 order-1 order-md-3 py-4 timeline-date">
                            <time>{{ $articale->created_at }}</time>
                        </div>
                        
                        <div class="col-9 col-md-5 ps-md-3 ps-lg-0 order-1 order-md-3 py-4 timeline-date">
                            <time><strong>Category Name :</strong> {{ $articale->category->name }}</time>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="timeline" id="articales2">
            </div>
    {{-- END ALL ARTICALES --}}
        </div>
    </div>
</section>
    
@endsection
@section('js')
    <script>
        $(document).ready(function()
        {
            $('#flash_message').show().fadeOut(3000);
        });
    </script>

    {{-- SEARCH  --}}
    
    <script>
        $(document).ready(function() 
        {

            $('#search').on('change',function()
            {
                var query = $(this).val();
                fetch_customer_data(query);

                function fetch_customer_data(query = '') 
                {

                    $.ajax({
                        url: "{{ route('user.articales.search') }}",
                        method: 'GET',
                        data: {
                            'filter': query
                        },
                        dataType: 'json',
                        success: function(data) 
                        {
                            if (query != '') 
                            {
                                $("#articales1").hide();
                                // alert(data.table_data);
                                $('#articales2').show().html(data.table_data);
                            } else
                            {
                                $("#articales1").show();
                                $("#articales2").hide();
                            }
                        },

                    })
                }
                
            });
        });
    
    </script>
@endsection