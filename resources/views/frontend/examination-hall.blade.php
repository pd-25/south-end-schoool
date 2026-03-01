@extends('frontend.layout.main')
@section('content')
<section id="inner-banner-slider" class="banner-slider main-banner">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
    <div class="carousel-inner" role="listbox"> 
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url('{{ asset('frontend-asset/images/inner-banner.jpg') }}');">
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
    <div class="row mb-4">
      <div class="col-lg-12 text-center">
        <h2>Examination Hall</h2>
        <p>The Examination Hall is one of the distinguished features of South End School. It is fully air-conditioned and spacious enough to accommodate the numbers of students for any examination. The interior decoration of the examination hall is executed by obeying all protocols of CISCE.</p>
        </div>
    </div>	
		<div class="row justify-content-center">
		<div class="col-lg-10">
       <img src="{{ asset('frontend-asset/images/eh.jpg') }}" class="img-fluid w-100 border-radius">
      </div>
    </div>
	
  </div>
</section>	
@endsection
