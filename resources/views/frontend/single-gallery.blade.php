@extends('frontend.layout.main')

@section('content')
{{-- @dd($gallery) --}}
    <section id="inner-banner-slider" class="banner-slider main-banner">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active"
                    style="background-image: url('{{ asset('frontend-asset/images/inner-banner.jpg') }}');">
                    <canvas id="canvas"></canvas>
                    <div class="carousel-caption">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Content -->
    <section id="inn-pg-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <h2>{{$galleryDetails->name}}</h2>
                    <p>{{$galleryDetails->short_description}}</p>
                </div>
            </div>
            <hr>
            <div class="row portfolio-item">
                @foreach ($gallery as $image)
                <div class="item col-lg-4 col-md-4 col-6 col-sm">
                    <a title="" href="{{ asset('storage/' . $image->image) }}"
                        class="fancylight popup-btn" data-fancybox-group="light">
                        <img class="img-fluid border-radius"
                            src="{{ asset('storage/' . $image->image) }}" alt="">
                    </a>
                </div>
                @endforeach
                {{-- <div class="item col-lg-4 col-md-4 col-6 col-sm">
                    <a title="" href="{{ asset('frontend-asset/images/gallery/gallery-pic1.jpg') }}"
                        class="fancylight popup-btn" data-fancybox-group="light">
                        <img class="img-fluid border-radius"
                            src="{{ asset('frontend-asset/images/gallery/gallery-pic1.jpg') }}" alt="">
                    </a>
                </div>
                <div class="item col-lg-4 col-md-4 col-6 col-sm">
                    <a title="" href="{{ asset('frontend-asset/images/gallery/gallery-pic1.jpg') }}"
                        class="fancylight popup-btn" data-fancybox-group="light">
                        <img class="img-fluid border-radius"
                            src="{{ asset('frontend-asset/images/gallery/gallery-pic1.jpg') }}" alt="">
                    </a>
                </div>
                <div class="item col-lg-4 col-md-4 col-6 col-sm">
                    <a title="" href="{{ asset('frontend-asset/images/gallery/gallery-pic1.jpg') }}"
                        class="fancylight popup-btn" data-fancybox-group="light">
                        <img class="img-fluid border-radius"
                            src="{{ asset('frontend-asset/images/gallery/gallery-pic1.jpg') }}" alt="">
                    </a>
                </div>
                <div class="item col-lg-4 col-md-4 col-6 col-sm">
                    <a title="" href="{{ asset('frontend-asset/images/gallery/gallery-pic1.jpg') }}"
                        class="fancylight popup-btn" data-fancybox-group="light">
                        <img class="img-fluid border-radius"
                            src="{{ asset('frontend-asset/images/gallery/gallery-pic1.jpg') }}" alt="">
                    </a>
                </div>
                <div class="item col-lg-4 col-md-4 col-6 col-sm">
                    <a title="" href="{{ asset('frontend-asset/images/gallery/gallery-pic1.jpg') }}"
                        class="fancylight popup-btn" data-fancybox-group="light">
                        <img class="img-fluid border-radius"
                            src="{{ asset('frontend-asset/images/gallery/gallery-pic1.jpg') }}" alt="">
                    </a>
                </div>
                <div class="item col-lg-4 col-md-4 col-6 col-sm">
                    <a title="" href="{{ asset('frontend-asset/images/gallery/gallery-pic1.jpg') }}"
                        class="fancylight popup-btn" data-fancybox-group="light">
                        <img class="img-fluid border-radius"
                            src="{{ asset('frontend-asset/images/gallery/gallery-pic1.jpg') }}" alt="">
                    </a>
                </div>
                <div class="item col-lg-4 col-md-4 col-6 col-sm">
                    <a title="" href="{{ asset('frontend-asset/images/gallery/gallery-pic1.jpg') }}"
                        class="fancylight popup-btn" data-fancybox-group="light">
                        <img class="img-fluid border-radius"
                            src="{{ asset('frontend-asset/images/gallery/gallery-pic1.jpg') }}" alt="">
                    </a>
                </div>
                <div class="item col-lg-4 col-md-4 col-6 col-sm">
                    <a title="" href="{{ asset('frontend-asset/images/gallery/gallery-pic1.jpg') }}"
                        class="fancylight popup-btn" data-fancybox-group="light">
                        <img class="img-fluid border-radius"
                            src="{{ asset('frontend-asset/images/gallery/gallery-pic1.jpg') }}" alt="">
                    </a>
                </div> --}}

            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend-asset/dist/simple-lightbox.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
    <script src="{{ asset('frontend-asset/dist/simple-lightbox.js?v2.2.1') }}"></script>
    <script>
        (function() {
            var $gallery = new SimpleLightbox('.gallery a', '.gallery a p', {});
        })();
    </script>
    <script>
        // $('.portfolio-item').isotope({
        //  	itemSelector: '.item',
        //  	layoutMode: 'fitRows'
        //  });
        $('.portfolio-menu ul li').click(function() {
            $('.portfolio-menu ul li').removeClass('active');
            $(this).addClass('active');

            var selector = $(this).attr('data-filter');
            $('.portfolio-item').isotope({
                filter: selector
            });
            return false;
        });
        $(document).ready(function() {
            var popup_btn = $('.popup-btn');
            popup_btn.magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });
    </script>
@endpush
