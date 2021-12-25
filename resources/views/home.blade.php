@extends('frontEnd.layouts.app')
@section('content')

{{-- STAER FLASH MESSAGES  --}}
<div id="flash_message">
    @include('backEnd.layouts.alerts.success')
    @include('backEnd.layouts.alerts.errors')
</div>
{{-- END FLASH MESSAGES  --}}

 <section class="section-padding pb-0" id="reviews">
            <div class="container">
                <div class="row">

                    <div class="col-12">
                        <h2 class="text-center mb-lg-5 mb-4">Our Patients</h2>

                        <div class="owl-carousel reviews-carousel">

                            <figure class="reviews-thumb d-flex flex-wrap align-items-center rounded">
                                <p class="text-primary d-block mt-2 mb-0 w-100"><strong>Atricales No</strong></p>

                                <p class="reviews-text w-100">Phasellus ligula ante, tempus ac imperdiet ut, mattis ac nibh. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>

                            </figure>

                            <figure class="reviews-thumb d-flex flex-wrap align-items-center rounded">
                                <p class="text-primary d-block mt-2 mb-0 w-100"><strong>Comments No</strong></p>

                                <p class="reviews-text w-100">Phasellus ligula ante, tempus ac imperdiet ut, mattis ac nibh. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>

                            </figure>

                            <figure class="reviews-thumb d-flex flex-wrap align-items-center rounded">
                                <p class="text-primary d-block mt-2 mb-0 w-100"><strong>Users No</strong></p>

                                <p class="reviews-text w-100">Phasellus ligula ante, tempus ac imperdiet ut, mattis ac nibh. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>

                            </figure>

                        </div>
                    </div>

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
@endsection