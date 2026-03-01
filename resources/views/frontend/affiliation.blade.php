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
      <div class="col-lg-7 align-self-center">
        <h2>Affiliation</h2>
        <p>South End School, Nalhati is affiliated to the COUNCIL FOR THE INDIAN SCHOOL CERTIFICATE EXAMINATIONS, New Delhi (ICSE).</p>
		<p>Our CISCE Affiliation No. <b>WB420</b></p>
        </div>
		<div class="col-lg-5">
       <img src="{{ asset('frontend-asset/images/affiliation-image.jpg') }}" class="img-fluid w-100">
      </div>
    </div>	
  </div>
</section>	
@endsection
