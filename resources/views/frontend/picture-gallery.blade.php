@extends('frontend.layout.main')
@section('content')
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
                    <h2>Picture Gallery</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                        and scrambled it to make a type specimen book. </p>
                </div>
            </div>
            <hr>
            <div class="row mt-5">
              @forelse ($pictureGalleries as $pictureGalleries)
                <div class="col-lg-4 mb-4">
                    <div class="gallery-box text-center">
                        <img src="{{ asset('storage/' . $pictureGalleries->preview_image) }}" class="img-fluid mb-lg-4">
                        <h3>{{ $pictureGalleries->name }}</h3>
                        <p>{{ $pictureGalleries->short_description }}</p>
                        <a href="{{ route('activities.single_gallery', $pictureGalleries->id) }}" class="rmBtn mr-0 mb-4">View All Images</a>
                    </div>
                </div>
                
              @empty
                <div class="col-lg-4 mb-4">
                    <div class="gallery-box text-center">
                        <img src="{{ asset('frontend-asset/images/gallery/gallery-pic1.jpg') }}" class="img-fluid mb-lg-4">
                        <h3>No Gallery Found</h3>
                        <p>No gallery images are available at the moment.</p>
                        {{-- <a href="single-gallery.html" class="rmBtn mr-0 mb-4">View All Images</a> --}}
                    </div>
                </div>
              @endforelse
                
                {{-- <div class="col-lg-4 mb-4">
                    <div class="gallery-box text-center">
                        <img src="{{ asset('frontend-asset/images/gallery/gallery-pic1.jpg') }}" class="img-fluid mb-lg-4">
                        <h3>Inter-House Drawing Competitions</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <a href="single-gallery.html" class="rmBtn mr-0 mb-4">View All Images</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="gallery-box text-center">
                        <img src="{{ asset('frontend-asset/images/gallery/gallery-pic1.jpg') }}" class="img-fluid mb-lg-4">
                        <h3>Inter-House Drawing Competitions</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <a href="single-gallery.html" class="rmBtn mr-0 mb-4">View All Images</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="gallery-box text-center">
                        <img src="{{ asset('frontend-asset/images/gallery/gallery-pic1.jpg') }}" class="img-fluid mb-lg-4">
                        <h3>Inter-House Drawing Competitions</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <a href="single-gallery.html" class="rmBtn mr-0 mb-4">View All Images</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="gallery-box text-center">
                        <img src="{{ asset('frontend-asset/images/gallery/gallery-pic1.jpg') }}" class="img-fluid mb-lg-4">
                        <h3>Inter-House Drawing Competitions</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <a href="single-gallery.html" class="rmBtn mr-0 mb-4">View All Images</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="gallery-box text-center">
                        <img src="{{ asset('frontend-asset/images/gallery/gallery-pic1.jpg') }}" class="img-fluid mb-lg-4">
                        <h3>Inter-House Drawing Competitions</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <a href="single-gallery.html" class="rmBtn mr-0 mb-4">View All Images</a>
                    </div>
                </div> --}}

            </div>
        </div>
    </section>
@endsection
