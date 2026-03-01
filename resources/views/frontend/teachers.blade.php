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
                <div class="col-lg-12 text-center mb-3">
                    <h2>Teachers</h2>
                    <p>My endeavour has always been strengthen the tri-polar bonding between the school, the students and
                        the Parents, so that we can share in the collaborative effort to bring about spiritual nurturing and
                        effective and successful learning.</p>
                </div>
            </div>
            <div class="row">
				@forelse ($teachers as $teacher)
					<div class="col-lg-3 mb-4">
						<div class="teacher-box">
							<img src="{{ asset('storage/' . $teacher->photo) }}" class="img-fluid w-100 mb-3">
							<h4>{{ $teacher->name }}</h4>
							<p class="c_name mb-2"><span>Designation:</span> {{ $teacher->designation }}</p>
							<p class="mb-0"><span>Qualification:</span> {{ $teacher->qualification }}</p>
							<p class="mb-0"><span>Experience:</span> {{ $teacher->experience }} Years</p>
						</div>
					</div>
					
				@empty
					<div class="col-lg-3 mb-4">
                    <div class="teacher-box">
                        <img src="{{ asset('frontend-asset/images/teacher-picture.jpg') }}" class="img-fluid w-100 mb-3">
                        <h4>No Teachers Found</h4>
                        <p class="c_name mb-2"><span>Designation:</span> N/A</p>
                        <p class="mb-0"><span>Qualification:</span> N/A</p>
                        <p class="mb-0"><span>Experience:</span> N/A</p>
                    </div>
                </div>
				@endforelse
                
                {{-- <div class="col-lg-3 mb-4">
                    <div class="teacher-box">
                        <img src="{{ asset('frontend-asset/images/teacher-picture.jpg') }}" class="img-fluid w-100 mb-3">
                        <h4>Ms. ARCHITA RAY CHOUDHURY</h4>
                        <p class="c_name mb-2"><span>Designation:</span> Principal</p>
                        <p class="mb-0"><span>Qualification:</span> M.Com., B.Ed.</p>
                        <p class="mb-0"><span>Experience:</span> 25 Years</p>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <div class="teacher-box">
                        <img src="{{ asset('frontend-asset/images/teacher-picture.jpg') }}" class="img-fluid w-100 mb-3">
                        <h4>Ms. ARCHITA RAY CHOUDHURY</h4>
                        <p class="c_name mb-2"><span>Designation:</span> Principal</p>
                        <p class="mb-0"><span>Qualification:</span> M.Com., B.Ed.</p>
                        <p class="mb-0"><span>Experience:</span> 25 Years</p>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <div class="teacher-box">
                        <img src="{{ asset('frontend-asset/images/teacher-picture.jpg') }}" class="img-fluid w-100 mb-3">
                        <h4>Ms. ARCHITA RAY CHOUDHURY</h4>
                        <p class="c_name mb-2"><span>Designation:</span> Principal</p>
                        <p class="mb-0"><span>Qualification:</span> M.Com., B.Ed.</p>
                        <p class="mb-0"><span>Experience:</span> 25 Years</p>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <div class="teacher-box">
                        <img src="{{ asset('frontend-asset/images/teacher-picture.jpg') }}" class="img-fluid w-100 mb-3">
                        <h4>Ms. ARCHITA RAY CHOUDHURY</h4>
                        <p class="c_name mb-2"><span>Designation:</span> Principal</p>
                        <p class="mb-0"><span>Qualification:</span> M.Com., B.Ed.</p>
                        <p class="mb-0"><span>Experience:</span> 25 Years</p>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <div class="teacher-box">
                        <img src="{{ asset('frontend-asset/images/teacher-picture.jpg') }}" class="img-fluid w-100 mb-3">
                        <h4>Ms. ARCHITA RAY CHOUDHURY</h4>
                        <p class="c_name mb-2"><span>Designation:</span> Principal</p>
                        <p class="mb-0"><span>Qualification:</span> M.Com., B.Ed.</p>
                        <p class="mb-0"><span>Experience:</span> 25 Years</p>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <div class="teacher-box">
                        <img src="{{ asset('frontend-asset/images/teacher-picture.jpg') }}" class="img-fluid w-100 mb-3">
                        <h4>Ms. ARCHITA RAY CHOUDHURY</h4>
                        <p class="c_name mb-2"><span>Designation:</span> Principal</p>
                        <p class="mb-0"><span>Qualification:</span> M.Com., B.Ed.</p>
                        <p class="mb-0"><span>Experience:</span> 25 Years</p>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <div class="teacher-box">
                        <img src="{{ asset('frontend-asset/images/teacher-picture.jpg') }}" class="img-fluid w-100 mb-3">
                        <h4>Ms. ARCHITA RAY CHOUDHURY</h4>
                        <p class="c_name mb-2"><span>Designation:</span> Principal</p>
                        <p class="mb-0"><span>Qualification:</span> M.Com., B.Ed.</p>
                        <p class="mb-0"><span>Experience:</span> 25 Years</p>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <div class="teacher-box">
                        <img src="{{ asset('frontend-asset/images/teacher-picture.jpg') }}" class="img-fluid w-100 mb-3">
                        <h4>Ms. ARCHITA RAY CHOUDHURY</h4>
                        <p class="c_name mb-2"><span>Designation:</span> Principal</p>
                        <p class="mb-0"><span>Qualification:</span> M.Com., B.Ed.</p>
                        <p class="mb-0"><span>Experience:</span> 25 Years</p>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <div class="teacher-box">
                        <img src="{{ asset('frontend-asset/images/teacher-picture.jpg') }}" class="img-fluid w-100 mb-3">
                        <h4>Ms. ARCHITA RAY CHOUDHURY</h4>
                        <p class="c_name mb-2"><span>Designation:</span> Principal</p>
                        <p class="mb-0"><span>Qualification:</span> M.Com., B.Ed.</p>
                        <p class="mb-0"><span>Experience:</span> 25 Years</p>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <div class="teacher-box">
                        <img src="{{ asset('frontend-asset/images/teacher-picture.jpg') }}" class="img-fluid w-100 mb-3">
                        <h4>Ms. ARCHITA RAY CHOUDHURY</h4>
                        <p class="c_name mb-2"><span>Designation:</span> Principal</p>
                        <p class="mb-0"><span>Qualification:</span> M.Com., B.Ed.</p>
                        <p class="mb-0"><span>Experience:</span> 25 Years</p>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <div class="teacher-box">
                        <img src="{{ asset('frontend-asset/images/teacher-picture.jpg') }}" class="img-fluid w-100 mb-3">
                        <h4>Ms. ARCHITA RAY CHOUDHURY</h4>
                        <p class="c_name mb-2"><span>Designation:</span> Principal</p>
                        <p class="mb-0"><span>Qualification:</span> M.Com., B.Ed.</p>
                        <p class="mb-0"><span>Experience:</span> 25 Years</p>
                    </div>
                </div> --}}

            </div>
        </div>
        </div>
    </section>
@endsection
