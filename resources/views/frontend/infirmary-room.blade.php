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
        <h2>Infirmary Room</h2>
        <p>The school has fully equipped with 1-bedded infirmary room with the service of a qualified nurse. A doctor on call is available during the school hours to attend to any health emergencies that may arise. Medical check-up of the students is regularly carried out and a record is maintained. School transport is always available in case of medical urgency.</p>
        </div>
    </div>	
		<div class="row justify-content-center">
		<div class="col-lg-10">
       <img src="{{ asset('frontend-asset/images/demo.jpg') }}" class="img-fluid w-100 border-radius">
      </div>
    </div>
	
  </div>
</section>	
@endsection
