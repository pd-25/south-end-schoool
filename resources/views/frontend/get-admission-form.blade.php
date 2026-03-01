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
    <div class="row">
      <div class="col-lg-12 mb-4">
        <h2>Admission Form</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
        </div>
		<div class="col-lg-12 mb-4">
        <div class="syllabust-box">
<div class="media">
  <img src="{{ asset('frontend-asset/images/pdf-icon.png') }}" class="mr-3" alt="...">
  <div class="media-body align-self-center">
   <h5 class="mt-0 mb-0"><a href="#">Download Admission Form 2026</a></h5>
  </div>
</div>
</div>
        </div>
    </div>	
  </div>
</section>	
@endsection
