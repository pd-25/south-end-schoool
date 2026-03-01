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
                    <h2>Syllabus  </h2>
                </div>
            </div>

            <div class="row">
              @forelse ($syllabus as $syllabusData)
                <div class="col-lg-4">
                    <div class="syllabust-box">
                        <div class="media">
                            <img src="{{ asset('frontend-asset/images/pdf-icon.png') }}" class="mr-3" alt="...">
                            <div class="media-body align-self-center">
                                <h5 class="mt-0 mb-0"><a href="{{ asset('storage/' . $syllabusData->pdf) }}" target="_blank">{{ $syllabusData->title }}</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                
              @empty
                 <div class="col-lg-4">
                    <div class="syllabust-box">
                        <div class="media">
                            <img src="{{ asset('frontend-asset/images/pdf-icon.png') }}" class="mr-3" alt="...">
                            <div class="media-body align-self-center">
                                <h5 class="mt-0 mb-0"><a href="#">No Syllabus Available</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
              @endforelse
               
                {{-- <div class="col-lg-4">
                    <div class="syllabust-box">
                        <div class="media">
                            <img src="{{ asset('frontend-asset/images/pdf-icon.png') }}" class="mr-3" alt="...">
                            <div class="media-body align-self-center">
                                <h5 class="mt-0 mb-0"><a href="#">Syllabus for L.K.G.</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="syllabust-box">
                        <div class="media">
                            <img src="{{ asset('frontend-asset/images/pdf-icon.png') }}" class="mr-3" alt="...">
                            <div class="media-body align-self-center">
                                <h5 class="mt-0 mb-0"><a href="#">Syllabus for U.K.G.</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="syllabust-box">
                        <div class="media">
                            <img src="{{ asset('frontend-asset/images/pdf-icon.png') }}" class="mr-3" alt="...">
                            <div class="media-body align-self-center">
                                <h5 class="mt-0 mb-0"><a href="#">Syllabus for Class I</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="syllabust-box">
                        <div class="media">
                            <img src="{{ asset('frontend-asset/images/pdf-icon.png') }}" class="mr-3" alt="...">
                            <div class="media-body align-self-center">
                                <h5 class="mt-0 mb-0"><a href="#">Syllabus for Class II</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="syllabust-box">
                        <div class="media">
                            <img src="{{ asset('frontend-asset/images/pdf-icon.png') }}" class="mr-3" alt="...">
                            <div class="media-body align-self-center">
                                <h5 class="mt-0 mb-0"><a href="#">Syllabus for Class III</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="syllabust-box">
                        <div class="media">
                            <img src="{{ asset('frontend-asset/images/pdf-icon.png') }}" class="mr-3" alt="...">
                            <div class="media-body align-self-center">
                                <h5 class="mt-0 mb-0"><a href="#">Syllabus for Class IV</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="syllabust-box">
                        <div class="media">
                            <img src="{{ asset('frontend-asset/images/pdf-icon.png') }}" class="mr-3" alt="...">
                            <div class="media-body align-self-center">
                                <h5 class="mt-0 mb-0"><a href="#">Syllabus for Class V</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="syllabust-box">
                        <div class="media">
                            <img src="{{ asset('frontend-asset/images/pdf-icon.png') }}" class="mr-3" alt="...">
                            <div class="media-body align-self-center">
                                <h5 class="mt-0 mb-0"><a href="#">Syllabus for Class VI</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="syllabust-box">
                        <div class="media">
                            <img src="{{ asset('frontend-asset/images/pdf-icon.png') }}" class="mr-3" alt="...">
                            <div class="media-body align-self-center">
                                <h5 class="mt-0 mb-0"><a href="#">Syllabus for Class VII</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="syllabust-box">
                        <div class="media">
                            <img src="{{ asset('frontend-asset/images/pdf-icon.png') }}" class="mr-3" alt="...">
                            <div class="media-body align-self-center">
                                <h5 class="mt-0 mb-0"><a href="#">Syllabus for Class VIII</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="syllabust-box">
                        <div class="media">
                            <img src="{{ asset('frontend-asset/images/pdf-icon.png') }}" class="mr-3" alt="...">
                            <div class="media-body align-self-center">
                                <h5 class="mt-0 mb-0"><a href="#">Syllabus for Class IX</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="syllabust-box">
                        <div class="media">
                            <img src="{{ asset('frontend-asset/images/pdf-icon.png') }}" class="mr-3" alt="...">
                            <div class="media-body align-self-center">
                                <h5 class="mt-0 mb-0"><a href="#">Syllabus for Class X</a></h5>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>

    </section>
@endsection
